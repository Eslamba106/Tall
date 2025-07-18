<?php

namespace App\Providers;

use App\Repositories\Interfaces\SubscriptionRepositoryInterface;
use App\Repositories\SubscriptionRepository;
use Laravel\Sanctum\Sanctum;
use App\Http\Traits\TenantService;
use App\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);

        $this->app->bind('Tenants',function()
        {
            return new TenantService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

 Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
}
}
