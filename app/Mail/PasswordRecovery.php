<?php

namespace TravelPlanner\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use TravelPlanner\Models\User;

class PasswordRecovery extends Mailable implements ShouldQueue
{
    use Queueable;

    public $user;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @param  User $user,
     * @param  string $password,
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \Log::info('Building PasswordRecovery');
        return $this->subject(__('New Password'))
            ->to($this->user->email)
            ->markdown('emails.password-recovery');
    }
}
