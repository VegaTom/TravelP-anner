<?php

namespace TravelPlanner\Http\Controllers\Auth;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use JWTAuth;
use JWTException;
use TravelPlanner\Http\Controllers\Controller;
use TravelPlanner\Models\User;

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
     * Handle a login request to the Backend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = JWTAuth::toUser($token);

        // all good so return the token
        $user->removePasswordRecoveryToken();
        return response()->json(compact('token', 'user'), 200);
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
        return response()->json('', 204);
    }

    /**
     * Retrieves user info for backend.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        return response()->json(JWTAuth::parseToken()->toUser(), 200);
    }
}
