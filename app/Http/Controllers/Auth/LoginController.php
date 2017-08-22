<?php

namespace TravelPlanner\Http\Controllers\Auth;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use JWTAuth;
use JWTException;
use TravelPlanner\Http\Controllers\Controller;
use TravelPlanner\Http\Requests\Login\Request as LoginRequest;
use TravelPlanner\Models\User;
use TravelPlanner\Transformers\UserTransformer;

/**
 * @resource Login
 *
 * Handles incoming login requests.
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->response = $response;

    }

    /**
     * Handle a login request.
     *
     * @param  \TravelPlanner\Http\Requests\Login\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized(__('general.errors.invalid_credentials'));
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->response->errorInternalError(__('general.errors.could_not_create_token'));
        }

        $user = JWTAuth::toUser($token);

        // all good so return the token
        $user->removePasswordRecoveryToken();
        return $this->response->withItem($user, new UserTransformer, null, compact('token'));
    }

    /**
     * Log the user out of the Application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->response->withArray([])->setStatusCode(204);
    }

    /**
     * Retrieves user info and renews the token.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $token = JWTAuth::parseToken()->refresh();

        return $this->response->withItem($user, new UserTransformer, null, compact('token'));
    }
}
