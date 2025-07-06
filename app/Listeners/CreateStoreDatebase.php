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
 

        // $this->copyDataToTenantDB($db, $store);
    }

    // private function copyDataToTenantDB(string $db, $company)
    // {
    //     DB::purge('tenant');
    //     Config::set('database.connections.tenant.database', $db);
    //     DB::reconnect('tenant');

    //     $tablesToCopy = ['roles', 'sections', 'permissions', 'regions', 'business_settings'
    //         , 'countries', 'country_masters', 'ownerships', 'property_types',
    //         // 'blocks', 'floors', 'unit_descriptions',
    //         // 'unit_types', 'unit_conditions', 'unit_parkings', //'groups','main_ledgers','invoice_settings' ,
    //         'views', 'business_activities', 'live_withs',
    //         'enquiry_statuses', 'enquiry_request_statuses',
    //         //  'units',
    //         //  'property_management','block_management', 'floor_management','unit_management',
    //         'departments', 'employee_types', 'employees', 'agents', 'complaint_categories',
    //         'maintenance_types', 'warranty_types', 'receipt_settings', 'service_masters', 'company_settings', 'admins'];
    //     foreach ($tablesToCopy as $table) {
    //         $data = DB::table($table)->get();
    //         if ($data->isNotEmpty()) {
    //             DB::connection('tenant')->table($table)->insert($data->map(function ($row) {
    //                 return (array) $row;
    //             })->toArray());
    //         }
    //     }

    //     $groupsData = DB::connection('mysql')->table('groups')
    //         ->whereNull('property_id')
    //         ->get();

    //     if ($groupsData->isNotEmpty()) {
    //         DB::connection('tenant')->table('groups')->insert($groupsData->map(fn($row) => (array) $row)->toArray());
    //     }

    //     $copiedGroupIds = $groupsData->pluck('id')->toArray();

    //     $ledgersData = DB::connection('mysql')->table('main_ledgers')
    //         ->whereIn('group_id', $copiedGroupIds)
    //         ->get();

    //     if ($ledgersData->isNotEmpty()) {
    //         DB::connection('tenant')->table('main_ledgers')->insert($ledgersData->map(fn($row) => (array) $row)->toArray());
    //     }

    //     $latestUser = DB::table('users')->orderBy('id', 'desc')->first();

    //     if ($latestUser) {
    //         DB::connection("tenant")->table('users')->insert((array) $latestUser);
    //     }

    //     $latestCompany = DB::table('companies')->orderBy('id', 'desc')->first();
    //     if ($latestCompany) {
    //         DB::connection("tenant")->table('companies')->insert((array) $latestCompany);
    //     }
    //     $branch = [
    //         'name'             => 'Main Branch',
    //         'logo'             => $company->logo,
    //         'domain'           => $company->domain,
    //         'address'          => $company->address1,
    //         'database_options' => $company->database_options1,
    //     ];
    //     DB::connection("tenant")->table('branches')->insert((array) $branch);
    //     DB::purge('tenant');
    //     DB::purge('tenant');

    //     Config::set('database.connections.tenant.database', 'finexerp_95');
    //     DB::reconnect('tenant');
    //     $latestCompany = DB::connection('mysql')->table('users')->orderBy('id', 'desc')->first();
    //     if ($latestCompany) {
    //         DB::connection("tenant")->table('users')->insert((array) $latestCompany);
    //     }

    // }
}
