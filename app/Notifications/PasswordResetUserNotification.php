<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Mail\ResetPasswordMail; 

class PasswordResetUserNotification extends ResetPassword
{
    use Queueable;

    
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     if (static::$toMailCallback) {
    //         return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    //     }

    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url(route('password_reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
    //                 ->line('Thank you for using our application!');
    // }

    // public function toMail($user)
    // {
    //     if (static::$toMailCallback) {
    //         return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    //     }
    //     $url = url(route('password.reset',['token' => $this->token,'email' => $user->email],false));
    //     $mail = new ResetPasswordMail($user,$url);
    //     return $mail->to($user->email);
    // }

}
