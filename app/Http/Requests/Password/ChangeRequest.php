<?php

namespace TravelPlanner\Http\Requests\Password;

use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\User;

class ChangeRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required_with:password|string',
        ];
    }
}
