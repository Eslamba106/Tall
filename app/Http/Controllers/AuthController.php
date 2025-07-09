<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use App\Events\StoreCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
     public function create()
    {
        return view('auth.register');
        // return Inertia::render('Auth/Register');
    }
     public function login_page()
    {
        return view('auth.login'); 
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   
    public function add_store(Request $request)
    {
 
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
                'password' => ['required', 'confirmed' ],
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
                'name' => $request->name,
                'tenant_id' => $user->id, // Assuming tenant_id is the user ID
                'status' => 'active', // Default status
                'domains' => Str::slug($slug, '_'), // Assuming no domains initially
                'theme'      => $request->theme,
                // 'database_options' => null, // Assuming no database options initially
            ]);
            event(new StoreCreated($store));

            // Auth::login($user);
            DB::commit();
            return redirect()->url("https://{{$store->domains}}localhost/tall3.com/");
            // return redirect(RouteServiceProvider::HOME);http://localhost/tall3.com/
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        Config::set('database.connections.mysql.database', 'tall');
        DB::purge('mysql');
        DB::reconnect('mysql');
        DB::setDefaultConnection('mysql'); 
        $databaseName = DB::connection()->getDatabaseName();
        // dd($databaseName);
        if (Auth::attempt($request->only('email', 'password'))) { 
            return redirect()->route('user.dashboard');
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    { 
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('index');
    }

}
