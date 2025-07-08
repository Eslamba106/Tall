<?php

namespace App\Http\Controllers\Api\Auth;

use Exception;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use App\Events\StoreCreated;
use Illuminate\Http\Request;
use App\Services\UserServices;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{

    public $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }
    // login function
    public function login(Request $request)
    {

        if ($this->userService->login($request)) {
            $user = User::with('store')->where('email', $request->email)->first();
            $options = json_decode($user->store->database_options, true);
            // $token_1 = $user->createToken($user->name)->plainTextToken;
            $user->setConnection('db_auth');  
            $token = $user->createToken('access-token')->plainTextToken;

            Config::set('database.connections.tenant.database', $options['dbname']);
            DB::purge('tenant');
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');
            $user->setConnection('tenant');
            $databaseName = DB::connection()->getDatabaseName(); 
            // $token_2 = $user->createToken($user->name)->plainTextToken;
            return response()->apiSuccess([
                'token' => $token,
                // 'token_1' => $token_1,
                // 'token_2' => $token_2,
                'user' => $user
            ]);
        }

        return response()->apiFail('email or password wrong', 401);
    }

    public function register(Request $request)
    {



        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'store_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:' . User::class,
                'password' => 'required',
                'user_name' => 'required|string|max:255|unique:' . User::class,
                'phone' => 'nullable|string|max:20',
                'theme' => 'nullable|string|max:255',
            ]);


            $user = (new User())->setConnection('mysql')->create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->user_name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $slug = $request->name . '_' . rand(1, 10000);
            $store = (new Store())->setConnection('mysql')->create([
                'name' => $request->store_name,
                'tenant_id' => $user->id,
                'status' => 'active',
                'domains' => Str::slug($slug, '_'),
                'theme' => $request->theme,
            ]);
            event(new StoreCreated($store));
            DB::commit();
            return  response()->apiSuccess('User registered successfully', [
                'user' => $user,
                'store' => $store,
                'token' => $user->createToken($user->name)->plainTextToken
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->apiFail($e->getMessage(), 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'massege' => 'User Successfully logout',
        ], 200);
    }
}
