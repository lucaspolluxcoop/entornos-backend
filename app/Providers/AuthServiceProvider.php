<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('do_action', function ($user, $permission) {
            return $user->role()
                ->with('permissions')->get()
                ->pluck('permissions.*.name')->flatten()
                ->contains($permission);
        });

        if (! $this->app->routesAreCached()) {

            /**
             * register the routes necessary to issue access tokens and revoke access tokens, clients, and personal access tokens
             */
            Passport::routes();

            /**
             * Token Lifetimes
             */
            Passport::tokensExpireIn(now()->addDays(15));
            Passport::refreshTokensExpireIn(now()->addDays(30));

        }

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return config('app.frontend_url') . "/reset-password?token={$token}";
        });
        VerifyEmail::createUrlUsing(function ($notifiable) {
            $id = $notifiable->getKey();
            $hash = sha1($notifiable->getEmailForVerification());
            $url = URL::signedRoute('verification.verify', compact('id', 'hash'));
            return str_replace('/auth/email/verify', '/verificar-email', $url);
        });
    }
}
