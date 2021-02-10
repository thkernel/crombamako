<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->subject('Activation de compte')
            ->line("Vous avez reçu cet email suite à votre inscription sur notre plate-forme, si vous n'êtes pas à l'origine de cette inscription, veuillez ignorer tout simplement cet email.")
            ->line("Vos informations d'access: ")
            ->line("Identifiant: " . $notifiable->login)
            ->line("Mot de passe: " . explode('_', $notifiable->login)[1])
            ->line('Cliquez sur le bouton ci-dessous pour activer votre compte.')
            ->action('Activer mon compte', $url);
    });



/*
        Gate::before(function ($user, $ability) {
            if ($user->isSuperUser()) {
                return true;
            }
            
        });

        */
    }
    
}
//return $user->id === $post->user_id
               // ? Response::allow()
               // : Response::deny('You do not own this post.');