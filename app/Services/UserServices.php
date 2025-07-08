<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UserServices 
{

 
    public function login($request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        Config::set('database.connections.mysql.database', 'tall');
        DB::purge('mysql');
        DB::reconnect('mysql');
        DB::setDefaultConnection('mysql'); 
        $databaseName = DB::connection()->getDatabaseName(); 
        if (Auth::attempt($request->only('email', 'password'))) { 
            return true;
        }else{
            return false;
        } 
    }
    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            return;
        } else {
            $file = $request->file('image');
            $path = $file->store('users', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }

}