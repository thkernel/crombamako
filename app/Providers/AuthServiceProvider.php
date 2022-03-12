<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Feature;
use App\Models\Post;

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

        // Translate verify email.
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->subject('Activation de compte')
            ->line("Vous avez reçu cet email suite à votre inscription sur notre plate-forme, si vous n'êtes pas à l'origine de cette inscription, veuillez ignorer tout simplement cet email.")
            ->line("Vos informations d'access: ")
            ->line("Identifiant: " . $notifiable->login)
            ->line("Mot de passe: " . explode("@", $notifiable->email)[0]."".$notifiable->userable_id)
            ->line('Cliquez sur le bouton ci-dessous pour activer votre compte.')
            ->action('Activer mon compte', $url);
        });

        // Translate reset password email.
        ResetPassword::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->subject('Notification de réinitialisation du mot de passe')
            ->line("Vous recevez cet email car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.")
            
            ->line("Ce lien de réinitialisation du mot de passe expirera dans 60 minutes.
                Si vous n'avez pas demandé de réinitialisation de mot de passe, aucune autre action n'est requise.")
            ->action('Réinitialiser le mot de passe', route('password.reset',$url));
        });




        Gate::before(function ($user, $ability) {
            if ($user->isSuperUser()) {
                return true;
            }
            else{
                //dd($user->permissions);

                foreach ($user->permissions as $permission) {
                    //dd($permission);
                    foreach($permission->permission_items as $permission_item){
                        $model = $permission_item->permission->feature->subject_class;
                        //dd($model);
                        $action_name = strtolower($permission_item->action_name);
                        //dd($action_name."-".strtolower($model));
                        Gate::define($action_name."-".strtolower($model), Post::class);

                    }
                }
            }
            
        });

        
    }
    
}
//return $user->id === $post->user_id
               // ? Response::allow()
               // : Response::deny('You do not own this post.');