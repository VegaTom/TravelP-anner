<?php

namespace TravelPlanner\Mail;

use Illuminate\Mail\Mailable;
use TravelPlanner\Models\User;

class PasswordRecoveryRequest extends Mailable
{

    public $user;
    public $actions;

    /**
     * Create a new notification instance.
     *
     * @param  User $user,
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->actions = [
            'accept' => url("password/{$user->email}/{$user->password_recovery_token}"),
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \Log::info('Building PasswordRecoveryRequest');
        return $this->subject(__('Request for Password Recovery'))
            ->to($this->user->email)
            ->markdown('emails.password-recovery-request');
    }
}
