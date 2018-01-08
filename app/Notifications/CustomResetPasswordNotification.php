<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
   public $token;
   
   public function __construct($token)
   {
      $this->token = $token;
   }
   
   public function via($notifiable)
   {
      return ['mail'];
   }

   public function toMail($notifiable)
   {
      return (new MailMessage)
        ->subject('Cambio de contraseña')
        ->line('Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.')
        ->action('Restablecer contraseña', url('password/reset', $this->token))
        ->line('Si no solicitó un restablecimiento de contraseña, no considere este correo');
   }
}
