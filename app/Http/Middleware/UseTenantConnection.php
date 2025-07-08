<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class UseTenantConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
              $token = $request->bearerToken();

        if ($token && Str::contains($token, '|')) {
            [$id, $plainToken] = explode('|', $token, 2); 
            $accessToken = \App\Models\PersonalAccessToken::on('tenant')->find($id);

            if ($accessToken && hash_equals($accessToken->token, hash('sha256', $plainToken))) {
                $user = $accessToken->tokenable;

                if ($user && $user->store) {
                    $options = json_decode($user->store->database_options, true);

                    // تغيير إعدادات الاتصال
                    Config::set('database.connections.tenant.database', $options['dbname']);
                    DB::purge('tenant');
                    DB::reconnect('tenant');
                    DB::setDefaultConnection('tenant');
                }
            }
        }


        return $next($request);
    }
}
