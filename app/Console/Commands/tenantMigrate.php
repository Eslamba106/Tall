<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Facade\Tenants;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class tenantMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'to:mi {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'single tenant migrate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $class = $this->argument('class');
        $tenant = Tenant::where('db',$class)->first();
            Tenants::switchTenant($tenant);
            $this->info('Start migrating : '.$tenant->domain);
            $this->info('-----------------------------------');
            Artisan::call('migrate --path=database/migrations/tenants --database=tenant');
            $this->info(Artisan::output());
      return Command::SUCCESS;

    }
}
