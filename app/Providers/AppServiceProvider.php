<?php

namespace App\Providers;

use App\Models\Plate;
use App\Models\Profile;
use App\Models\Notification;
use App\Observers\PlateObserver;
use App\Observers\ProfileObserver;
use App\Observers\NotificationObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Profile::observe(ProfileObserver::class);
        Plate::observe(PlateObserver::class);
        Notification::observe(NotificationObserver::class);
    }
}
