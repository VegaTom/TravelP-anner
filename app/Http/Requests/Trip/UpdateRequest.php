<?php

namespace TravelPlanner\Http\Requests\Trip;

use Illuminate\Validation\Rule;
use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\Trip;

class UpdateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', Trip::findOrFail($this->id));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination' => 'sometimes|required|string',
            'comment' => 'nullable|string',
            'start_date' => 'sometimes|required|date_format:Y-m-d\TH:i:sP',
            'end_date' => 'required_with:start_date|date_format:Y-m-d\TH:i:sP|after:start_date',
        ];
    }
}
