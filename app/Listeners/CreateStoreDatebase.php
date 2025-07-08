<?php

namespace App\Listeners;

use DirectoryIterator;
use App\Events\StoreCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateStoreDatebase
{
    /**
     * Create the event listener.
     */
   public function handle(StoreCreated $event): void
    {
        $store                   = $event->store;
        $db                        = "tall_{$store->id}";
        $store->database_options = [
            'dbname' => $db,
        ];
        $store->save();
 
        DB::statement("CREATE DATABASE `{$db}`");

        Config::set('database.connections.tenant.database', $db);
        DB::purge('tenant');
        DB::reconnect('tenant'); 
       Config::set('database.connections.tenant.database', $db);
        $dir = new DirectoryIterator(database_path('migrations/tenants'));
        foreach ($dir as $file) {
            if ($file->isFile()) {
                Artisan::call('migrate', [
                    '--database'        => 'tenant',
                    '--path'  =>  'database/migrations/tenants/' . $file->getFilename(),
                    '--force'   => true,
                ]);
            };
        }
 

        $this->copyDataToTenantDB($db, $store);
    }

    private function copyDataToTenantDB(string $db, $company)
    {
        // DB::purge('tenant');
        // Config::set('database.connections.tenant.database', $db);
        // DB::reconnect('tenant');
 

      
        
       
        // DB::purge('mysql');
  	  $latestUser = DB::connection("mysql")->table('users')->orderBy('id', 'desc')->first();

        if ($latestUser) {
            DB::connection("tenant")->table('users')->insert((array) $latestUser);
        }
        $latestStore = DB::connection("mysql")->table('stores')->orderBy('id', 'desc')->first();

        if ($latestStore) {
            DB::connection("tenant")->table('stores')->insert((array) $latestStore);
        }
        // Config::set('database.connections.mysql.database', 'talatala');
        // DB::reconnect('mysql');
        // $last_user = DB::connection('mysql')->table('users')->orderBy('id', 'desc')->first();
        // if ($last_user) {
        //     DB::connection("tenant")->table('users')->insert((array) $last_user);
        // }
        // Config::set('database.connections.mysql.database', 'talatala');
        // DB::reconnect('mysql');
        // $latestStore= DB::connection('mysql')->table('store')->orderBy('id', 'desc')->first();
        // if ($latestStore) {
        //     DB::connection("tenant")->table('stores')->insert((array) $latestStore);
        // }

    }
}
