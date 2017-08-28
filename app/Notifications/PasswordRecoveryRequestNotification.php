<?php

namespace TravelPlanner\Notifications;

use Illuminate\Notifications\Notification;
use TravelPlanner\Mail\PasswordRecoveryRequest;

class PasswordRecoveryRequestNotification extends Notification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {}

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
        $actions = [
            'accept' => url("password/{$notifiable->email}/{$notifiable->password_recovery_token}"),
        ];
        \Log::notice('Ready to mail');
        return new PasswordRecoveryRequest($notifiable, $actions);
    }
}
