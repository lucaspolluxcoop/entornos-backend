<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    protected $token;

    protected $profile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $profile)
    {
        $this->token = $token;

        $this->profile = $profile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = config('app.frontend_url') . "/reset-password?token={$this->token}";
        $fullName = $this->profile->first_name . ' ' . $this->profile->last_name;

        return ( new MailMessage )
            ->greeting("Hola! $fullName")
            ->subject( 'Nuevo Usuario Creado' )
            ->line( "Felicidades, su usuario ha sido creado con éxito y ya puede comenzar a usar la aplicación. Por favor ingrese en el siguiente link para completar su cuenta." )
            ->action( 'Completar Registro', $link )
            ->salutation('Saludos!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
