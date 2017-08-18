<?php
namespace TravelPlanner\Models;

use Hash;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TravelPlanner\Events\PasswordRecoveryEvent;
use TravelPlanner\Events\PasswordRecoveryRequestEvent;

class User extends Authenticatable
{
    use Notifiable, Authorizable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_recovery_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->orderBy('level')->withTimeStamps();
    }

    public function adminRole()
    {
        return $this->roles()->adminRole();
    }

    public function userRole()
    {
        return $this->roles()->userRole();
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    public function updatePassword($password)
    {
        $this->update(['password' => $password]);
        return $this;
    }

    public function getIsAdminAttribute()
    {
        return $this->adminRole()->exists();
    }

    public function getIsUserAttribute()
    {
        return $this->userRole()->exists();
    }

    public function setUserRole($detach = true)
    {
        $this->roles()->sync(Role::whereLevel(2)->first(), $detach);

        return $this;
    }

    public function setAdminRole($detach = true)
    {
        $this->roles()->sync(Role::whereLevel(1)->first(), $detach);

        return $this;
    }

    public function toggleAdminRole()
    {
        $this->roles()->toggle(Role::whereLevel(1)->first());
        return $this;
    }

    public function handlePasswordRecoveryRequest()
    {
        event(new PasswordRecoveryRequestEvent($this));
        return true;
    }

    public function handlePasswordRecovery()
    {
        event(new PasswordRecoveryEvent($this));
        return true;
    }

    public function removePasswordRecoveryToken()
    {
        $this->password_recovery_token = null;
        $this->save();
        return $this;
    }

    public function scopeWithUserRole($query)
    {
        return $query->whereHas('roles', function ($roles) {
            $roles->userRole();
        });
    }

    public function scopeOnlyUser($query)
    {
        return $query
            ->withUserRole()
            ->whereHas('roles', function ($roles) {
                $roles->adminRole();
            }, '<');
    }

}
