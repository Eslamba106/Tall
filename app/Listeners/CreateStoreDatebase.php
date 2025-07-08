<?php
namespace App\Listeners;

use App\Events\StoreCreated;
use DirectoryIterator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateStoreDatebase
{
    /**
     * Create the event listener.
     */
    public function handle(StoreCreated $event): void
    {
        $store                   = $event->store;
        $db                      = "tall_{$store->id}";
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
                    '--database' => 'tenant',
                    '--path'     => 'database/migrations/tenants/' . $file->getFilename(),
                    '--force'    => true,
                ]);
            }
        }

        $this->copyDataToTenantDB($db, $store);
    }

    private function copyDataToTenantDB(string $db, $company)
    {
<<<<<<< HEAD
        // DB::purge('tenant');
        // Config::set('database.connections.tenant.database', $db);
        // DB::reconnect('tenant');
 

      
        
       
        // DB::purge('mysql');
  	  $latestUser = DB::connection("mysql")->table('users')->orderBy('id', 'desc')->first();
=======
   $tablesToCopy = ['car_types' , 'car_models','estate_products', 'estate_product_types','estate_product_transactions' , 'cities' , 'districts'];
        foreach ($tablesToCopy as $table) {
            $data = DB::connection("mysql")->table($table)->get();
            if ($data->isNotEmpty()) {
                DB::connection('tenant')->table($table)->insert($data->map(function ($row) {
                    return (array) $row;
                })->toArray());
            }
        }
        $latestUser = DB::connection("mysql")->table('users')->orderBy('id', 'desc')->first();
>>>>>>> 61b02d597743f77924c3816e2ff85e09167a4798

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
