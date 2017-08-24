<?php

namespace TravelPlanner\Http\Controllers\Auth;

use JWTAuth;
use TravelPlanner\Http\Controllers\Controller;
use TravelPlanner\Http\Requests\Password\ChangeRequest;
use TravelPlanner\Http\Requests\Password\RecoveryRequest;
use TravelPlanner\Http\Requests\Password\RequestRecoveryRequest;
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
     * @param  \App\Http\Requests\Password\RecoveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordRecovery(RecoveryRequest $request, $email)
    {
        User::whereEmail($email)->first()->handlePasswordRecovery();
        return view('success')->with('message', __('We have sent you a new email with further instructions'));
    }

    /**
     * Password Request Recovery.
     *
     * @param  \App\Http\Requests\Password\RequestRecoveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordRequestRecovery(RequestRecoveryRequest $request)
    {
        User::whereEmail($request->email)->first()->handlePasswordRecoveryRequest();
        return $this->response->withArray([])->setStatusCode(204);
    }

    /**
     * Password Change.
     *
     * @param  \App\Http\Requests\Password\ChangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function change(ChangeRequest $request)
    {
        JWTAuth::parseToken()->toUser()->changePassword($request);
        return $this->response->withArray([])->setStatusCode(204);
    }
}
