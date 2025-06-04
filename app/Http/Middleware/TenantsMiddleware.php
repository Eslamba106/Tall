<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use App\Facade\Tenants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;
use App\Models\plan;
use Carbon\Carbon;

class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        if ($host == env('HOST_URL')) {
            return $next($request);
        }
        $cacheKey = 'tenant_' . $host;
        $tenant = Cache::rememberForever($cacheKey, function () use ($host) {
            return Tenant::where('domain',$host)->orWhere('domains',$host)->first();
        });
        
        if (!empty($tenant)) {

            // Switch landlord to Tenant
            Tenants::switchTenant($tenant);

        }else{
            abort(404);
        }
        return $next($request);
    }
}

