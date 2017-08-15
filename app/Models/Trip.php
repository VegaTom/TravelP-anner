<?php

namespace TravelPlanner\Models;

use Carbon\Carbon;

class Trip extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destination', 'start_date', 'end_date', 'comment',
    ];

    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('Y-m-d\TH:i:sP', $date)->setTimezone('UTC');
    }

    public function setEndDateAttribute($date)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('Y-m-d\TH:i:sP', $date)->setTimezone('UTC');
    }
}
