<?php
namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SetActiveStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Config::set('database.connections.mysql.database', 'tall');
        DB::purge('mysql');
        DB::reconnect('mysql');
        DB::setDefaultConnection('mysql');
        $host  = $request->getHost();
        $base  = strstr($host, '.', true);
        $store = Store::where('domains', $base)->first();
        if ($store) {
            $db = $store->database_options['dbname'] ?? 'tall_' . $store->id;
            Config::set('database.connections.tenant.database', $db);
            DB::purge('tenant');
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant');

            app()->instance('store', $store);
        }
        
        return $next($request);
    }
}
