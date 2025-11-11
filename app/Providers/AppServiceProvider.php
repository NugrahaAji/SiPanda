<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Policies\SuratMasukPolicy;
use App\Policies\SuratKeluarPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        SuratMasuk::class => SuratMasukPolicy::class,
        SuratKeluar::class => SuratKeluarPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
