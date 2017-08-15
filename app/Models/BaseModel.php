<?php

namespace Pasify\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public $incrementing = false;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function modify(array $request = [])
    {
        $this->update($request);
        return $this;
    }

    public function getIsActiveAttribute()
    {
        return empty($this->deleted_at);
    }
}
