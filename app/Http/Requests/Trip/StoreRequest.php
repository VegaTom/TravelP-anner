<?php

namespace TravelPlanner\Http\Requests\Trip;

use Illuminate\Validation\Rule;
use TravelPlanner\Http\Requests\BaseRequest;
use TravelPlanner\Models\Trip;

class StoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Trip::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination' => 'required|string',
            'comment' => 'nullable|string',
            'start_date' => 'required|date_format:Y-m-d\TH:i:sP',
            'end_date' => 'required|date_format:Y-m-d\TH:i:sP|after:start_date',
            'user_id' => [
                'required',
                Rule::exists('users', 'id')->using(function ($q) {
                    if (!$this->user()->is_admin) {
                        $q->whereId($this->user()->id);
                    }
                }),
            ],
        ];
    }
}
