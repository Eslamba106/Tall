<?php

namespace App\Console\Commands;

use DirectoryIterator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class MigrateTenants extends Command
{
    protected $signature = 'tenants:migrate';
    protected $description = 'Run migrations for all tenants';

    public function handle()
    {
        $tenants = DB::connection('mysql')->table('stores')->get();

        foreach ($tenants as $tenant) {
            $this->info("Migrating tenant: {$tenant->id}");
            $dbOptions = json_decode($tenant->database_options);

            Config::set('database.connections.tenant', [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => $dbOptions->dbname,
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ]);
            DB::reconnect('tenant');
            DB::setDefaultConnection('tenant'); 
            Artisan::call('migrate', [
                '--database' => 'tenant',
                '--path'     => 'database/migrations/tenants',
                '--force'    => true,
            ]);


            $this->info(Artisan::output());
        }

        $this->info('All tenant migrations completed.');
    }
}
