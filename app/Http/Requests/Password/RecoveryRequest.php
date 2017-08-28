<?php

namespace TravelPlanner\Http\Requests\Password;

use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\User;

class RecoveryRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !empty($user = User::whereEmail($this->email)->first()) && !empty($user->password_recovery_token) && $user->password_recovery_token == $this->token;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
