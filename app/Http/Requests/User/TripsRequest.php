<?php

namespace TravelPlanner\Http\Requests\User;

use Illuminate\Validation\Rule;
use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\User;

class TripsRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('view', User::findOrFail($this->id));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination' => 'nullable|string',
            'start_date' => 'nullable|date_format:Y-m-d\TH:i:sP',
            'end_date' => 'nullable|date_format:Y-m-d\TH:i:sP' . (!empty($this->start_date) ? '|after:start_date' : ''),
        ];
    }
}
