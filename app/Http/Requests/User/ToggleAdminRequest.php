<?php

namespace TravelPlanner\Http\Requests\User;

use Illuminate\Validation\Rule;
use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\User;

class ToggleAdminRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->is_admin;
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
