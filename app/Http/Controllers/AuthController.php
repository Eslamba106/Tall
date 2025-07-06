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
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
     public function create()
    {
        return view('Auth/Register');
        // return Inertia::render('Auth/Register');
    }
     public function login_page()
    {
        return view('Auth/login');
        // return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $slug = $request->name . '_' . rand(1, 10000);
            $store = Store::create([
                'name' => $request->name,
                'tenant_id' => $user->id, // Assuming tenant_id is the user ID
                'status' => 'active', // Default status
                'domains' => Str::slug($slug, '_'), // Assuming no domains initially
                // 'database_options' => null, // Assuming no database options initially
            ]);
            event(new StoreCreated($user));

            Auth::login($user);
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function add_store(Request $request)
    {
                // dd($request->all());

        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
                'password' => ['required', 'confirmed' ],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->user_name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $slug = $request->name . '_' . rand(1, 10000);
            $store = Store::create([
                'name' => $request->name,
                'tenant_id' => $user->id, // Assuming tenant_id is the user ID
                'status' => 'active', // Default status
                'domains' => Str::slug($slug, '_'), // Assuming no domains initially
                'theme'      => $request->theme,
                // 'database_options' => null, // Assuming no database options initially
            ]);
            event(new StoreCreated($store));

            Auth::login($user);
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
