<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user ,$ability){
                if($user->hasRole('super-admin')){
                    return true;
                }
        });
        //

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            // dd($notifiable, $url);
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line("Hello $notifiable->username Click the links below to verify your email address.")
                ->action('Verify Email Address', $url);
        });
    }
}
