<?php

namespace TravelPlanner\Notifications;

use Illuminate\Notifications\Notification;
use TravelPlanner\Mail\PasswordRecovery;

class PasswordRecoveryNotification extends Notification
{

    protected $password;
    /**
     * Create a new notification instance.
     *
     * @param string $password
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
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
        \Log::notice('Ready to mail');
        return new PasswordRecovery($notifiable, $this->password);
    }
}
