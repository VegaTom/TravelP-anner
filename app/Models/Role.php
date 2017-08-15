<?php

namespace TravelPlanner\Models;

class Role extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'level',
    ];

    protected $casts = [
        'level' => 'int',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function routePermissions()
    {
        return $this->belongsToMany(Route::class)->withTimeStamps();
    }

    public function scopeAdminRole($query)
    {
        return $query->where('level', 1);
    }

    public function scopeUserRole($query)
    {
        return $query->where('level', 2);
    }

    public function getIsUserRoleAttribute()
    {
        return $this->level == 2;
    }

    public function getIsAdminRoleAttribute()
    {
        return $this->level == 1;
    }
}
