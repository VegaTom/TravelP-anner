<?php

namespace TravelPlanner\Http\Controllers\Auth;

use TravelPlanner\Http\Controllers\Controller;
use TravelPlanner\Http\Requests\PasswordRecoveryRequest;
use TravelPlanner\Http\Requests\PasswordRequestRecoveryRequest;
use TravelPlanner\Models\User;

/**
 * @resource Password Recovery
 *
 * Handles incoming Password recovery requests.
 */
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Password Recovery.
     *
     * @param  \App\Http\Requests\PasswordRecoveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordRecovery(PasswordRecoveryRequest $request, $email)
    {
        User::whereEmail($email)->first()->handlePasswordRecovery();
        return view('success')->with('message', __('We have sent you a new email with further instructions'));
    }

    /**
     * Password Request Recovery.
     *
     * @param  \App\Http\Requests\PasswordRequestRecoveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordRequestRecovery(PasswordRequestRecoveryRequest $request)
    {
        User::whereEmail($request->email)->first()->handlePasswordRecoveryRequest();
        return $this->response->withArray([])->setStatusCode(204);
    }
}
