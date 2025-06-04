<?php
namespace App\Http\Traits;

use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class TenantService
{
    private  $tenant;

    public function switchTenant(Tenant $tenant){
        if (!$tenant instanceof Tenant) {
           abort(404);
        }
        DB::purge('landlord');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database',$tenant->db);
        //DB::connection('tenant')->reconnect();
        $this->tenant = $tenant;
        DB::setDefaultConnection('tenant');
    }

    public function switchLandlord(){
        DB::purge('tenant');
        //DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('landlord');
    }

    public function getTenant(){
       return $this->tenant;
    }
    public function createDB(Tenant $tenant){
        DB::connection('tenant')->statement("CREATE DATABASE $tenant->db");

        $this->switchTenant($tenant);
        Artisan::call('migrate --path=database/migrations/tenants --database=tenant');
        //Artisan::call('db:seed --class=MainSeeder --database=tenant');
     }
     public function destroyDB(Tenant $tenant){
        DB::connection('tenant')->statement("DROP DATABASE $tenant->db");
     }
}
