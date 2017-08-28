<?php

namespace TravelPlanner\Http\Requests\Trip;

use Illuminate\Validation\Rule;
use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\Trip;

class DeleteRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete', Trip::findOrFail($this->id));
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
