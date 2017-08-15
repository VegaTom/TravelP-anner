<?php
namespace Pasify\Models;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JWTAuth;
use Pasify\Events\ActivateAccountEvent;
use Pasify\Events\ActiveAccountEvent;
use Pasify\Events\PasswordRecoveryEvent;
use Pasify\Events\PasswordRecoveryRequestEvent;
use Pasify\Notifications\ClaimedPriceNotification;
use Request;

class User extends Authenticatable
{
    use Notifiable, Authorizable, SoftDeletes;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'imei', 'fb_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_recovery_token', 'activation_token',
    ];

    protected $casts = [
        'active' => 'boolean',
        'blocked' => 'boolean',
    ];

    public function setFbIdIfNone($fbId = null)
    {
        if (!empty($fbId) && empty($this->fb_id)) {
            $this->fb_id = $fbId;
            $this->save();
        }
        return $this;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }

    public function loginAttempts()
    {
        return $this->hasMany(LoginAttempt::class)->orderBy('login_attempts.created_at', 'desc');
    }

    public function adminRoles()
    {
        return $this->roles()->where('level', '<', 4)->withPivot('active');
    }

    public function adminRole()
    {
        return $this->adminRoles()->where('level', 1);
    }

    public function analystRole()
    {
        return $this->adminRoles()->where('level', 2);
    }

    public function visitorRole()
    {
        return $this->adminRoles()->where('level', 3);
    }

    public function userRole()
    {
        return $this->roles()->where('level', 4);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class, 'id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class)->latest();
    }

    public function travels()
    {
        return $this->belongsToMany(Travel::class)->orderBy('travel_user.created_at', 'desc')->withTimeStamps()->withPivot('_id', 'hour', 'ticket_ammount', 'partners', 'score', 'closed', 'total_time', 'total_distance', 'average_speed', 'maximun_speed');
    }

    public function operators()
    {
        return $this->travels()
            ->when(!empty(Request::get('route_id')), function ($q) {
                return $q->whereRouteId(Request::get('route_id'));
            })
            ->with('operator.complaints', 'complaints.complaintSubcategory.complaintCategory', 'route.origin.city.state', 'route.destiny.city.state')
            ->orderBy('travel_user.score', 'desc')
            ->get()
            ->sortBy('route.origin.city.state.name', SORT_REGULAR, true)
            ->sortBy('route.origin.city.name', SORT_REGULAR, true)
            ->sortBy('route.origin.name', SORT_REGULAR, true)
            ->sortBy('route.destiny.city.state.name', SORT_REGULAR, true)
            ->sortBy('route.destiny.city.name', SORT_REGULAR, true)
            ->sortBy('route.destiny.name', SORT_REGULAR, true)
            ->groupBy('route_id');

        // return $this->travels()
        //     ->wherePivot('closed', 1)
        //     ->leftJoin('complaints as c', 'c.travel_id', '=', 'travels.id')
        //     ->leftJoin('complaint_subcategories as cs', function ($j) {
        //         $j->on('cs.id', '=', 'c.complaint_subcategory_id');
        //     })
        //     ->leftJoin('complaint_categories as cc', function ($j) {
        //         $j->on('cc.id', '=', 'cs.complaint_category_id')
        //             ->where('cc.number', 4);
        //     })
        //     ->when($request->origin_stop_id, function ($q) use ($request) {
        //         return $q->where('travels.origin_stop_id', $request->origin_stop_id);
        //     })
        //     ->groupBy('origin_stop_id', 'destiny_stop_id')
        //     ->select(
        //         DB::raw('avg(score) as avg_score'),
        //         DB::raw('count(c.id) as count_complaints'),
        //         DB::raw('count(travels.id) as total_travels'),
        //         DB::raw('count(cc.id) as total_lates'),
        //         DB::raw('(count(cc.id)/count(travels.id)*100) as percent_lates'),
        //         DB::raw('count(c.id)/count(travels.id)*100 as percent_complaints'),
        //         DB::raw('count(cc.id) as total_lates'),
        //         'o.name as operator_name'
        //     )
        //     ->orderBy('avg_score', 'desc')
        //     ->get();

        // return $this->travels()
        //     ->wherePivot('closed', 1)
        //     ->leftJoin('complaints as c', 'c.travel_id', '=', 'travels.id')
        //     ->leftJoin('complaint_subcategories as cs', function ($j) {
        //         $j->on('cs.id', '=', 'c.complaint_subcategory_id');
        //     })
        //     ->leftJoin('complaint_categories as cc', function ($j) {
        //         $j->on('cc.id', '=', 'cs.complaint_category_id')->where('cc.number', 4);
        //     })
        //     ->join('operators as o', 'o.id', '=', 'travels.operator_id')
        //     ->get()
        //     ->groupBy('route_id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class)->orderBy('positions.created_at', 'desc');
    }

    public function fcmTokens()
    {
        return $this->hasMany(UserFcm::class);
    }

    public function routeNotificationForFcm()
    {
        return $this->fcmTokens()->pluck('token')->toArray();
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->latest()->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->latest();
    }

    public function shares()
    {
        return $this->hasMany(Share::class)->latest();
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class)->latest('action_user.created_at')->withTimeStamps()->withPivot('points', 'travel_id', 'complaint_id', 'share_id');
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class)->orderBy('price_user.created_at', 'desc')->withTimeStamps()->withPivot('ammount');
    }

    public function selectedAnswers()
    {
        return $this->belongsToMany(Answer::class, 'answer_user', 'user_id', 'answer_id')->withTimeStamps()->withPivot('travel_id');
    }

    public function registryAnswers()
    {
        return $this->belongsToMany(Answer::class, 'answer_user', 'user_id', 'answer_id')->whereHas('question.trivia', function ($q) {
            $q->whereRegister(true);
        });
    }

    public function answeredQuestions()
    {
        return $this->selectedAnswers->map->questions();
    }

    public function answeredTrivias()
    {
        return $this->answeredQuestions()->map->trivias();
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
        return !empty($this->adminRole()->first());
    }

    public function getIsAnalystAttribute()
    {
        return !empty($this->analystRole()->first());
    }

    public function getIsVisitorAttribute()
    {
        return !empty($this->visitorRole()->first());
    }

    public function getIsUserAttribute()
    {
        return !empty($this->userRole()->first());
    }

    public function getIsLoggedAsSupportAttribute()
    {
        if ($this->isLogged()) {
            return $this->id === $this->isLogged()->id && boolval(JWTAuth::parseToken()->getPayload()->get('support'));
        }
        return false;
    }

    public function getShareRegistryAttribute()
    {
        if ($this->share_registry_after_first_login) {
            $this->share_registry_after_first_login = false;
            $this->save();
            return true;
        }
        return false;
    }

    protected function isLogged()
    {
        try {
            return JWTAuth::parseToken()->toUser();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getNameAttribute()
    {
        return $this->userProfile()->first()->full_name ?? null;
    }

    public function setUserRole()
    {
        $this->roles()->syncWithoutDetaching(Role::where('level', 4)->first());
        return $this->load('userRole');
    }

    protected function dropUserRole()
    {
        $this->roles()->detach(Role::where('level', 4)->first());
        return $this;
    }

    protected function setAdminRole()
    {
        $this->roles()->attach(Role::where('level', 1)->first());
        return $this->load('adminRole');
    }

    protected function dropAdminRole()
    {
        $this->roles()->detach(Role::where('level', 1)->first());
        return $this;
    }

    protected function setAnalystRole()
    {
        $this->roles()->attach(Role::where('level', 2)->first());
        return $this->load('analystRole');
    }

    protected function dropAnalystRole()
    {
        $this->roles()->detach(Role::where('level', 2)->first());
        return $this;
    }

    protected function setVisitorRole()
    {
        $this->roles()->attach(Role::where('level', 3)->first());
        return $this->load('visitorRole');
    }

    protected function dropVisitorRole()
    {
        $this->roles()->detach(Role::where('level', 3)->first());
        return $this;
    }

    public function updateRole($role = null)
    {
        if (!empty($role)) {

            $roles = [$role];

            if (Role::find($role)->level > 3) {
                $this->roles()->syncWithoutDetaching($roles);
                return $this->load('roles');
            }
            if ($this->is_user) {
                array_push($roles, $this->userRole()->first()->id);
            }
            $this->roles()->sync($roles);

        }
        return $this->load('roles');
    }

    public function updateProfile($data)
    {
        $data = collect($data)->filter()->toArray();

        $this->userProfile()->updateOrCreate(['id' => $this->id], $data);
        return $this->load('userProfile');
    }

    public function setRegisterAnswers($answers = [])
    {
        if (!empty($answers)) {
            $this->selectedAnswers()->sync($answers);
        }
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

    public function activate($event = true)
    {
        if (!$this->active) {
            $this->active = true;
            $this->activation_token = null;
            $this->save();
            if ($event) {
                event(new ActiveAccountEvent($this));
            }
        }
        return $this;
    }

    public function requestActivation()
    {
        if (!$this->active) {
            $this->activation_token = str_random(50);
            $this->save();
            event(new ActivateAccountEvent($this));
        }
        return $this;
    }

    public function getActiveAttribute($value)
    {
        return (boolean) ($this->is_user ?
            ($this->attributes['active'] ?? false) :
            ($this->roles()->withPivot('active')->adminRoles()->first()->pivot->active ?? false));
    }

    public function toggleStatus()
    {
        $role = $this->roles()->withPivot('active')->adminRoles()->first();
        $role->pivot->update(['active' => !$role->pivot->active]);
        return $this;
    }

    public function revokeAccess()
    {
        if ($this->is_user) {
            return $this->dropVisitorRole()->dropAnalystRole()->dropAdminRole();
        }
        return $this->forceDelete();
    }

    public function block()
    {
        $this->blocked = true;
        $this->save();
        return $this;
    }

    public function unBlock()
    {
        $this->blocked = false;
        $this->save();
        return $this;
    }

    public function toggleBlock()
    {
        $this->blocked = !$this->blocked;
        $this->save();
        return $this;
    }

    public function revokeAccessOrDelete()
    {
        if ($this->is_admin || $this->is_analyst || $this->is_visitor) {
            return $this->dropUserRole();
        }
        return $this->forceDelete();
    }

    public function scopeIsAdmin($query)
    {
        return $query->has('adminRole')->with('adminRole');
    }

    public function scopeIsAnalyst($query)
    {
        return $query->has('analystRole')->with('analystRole');
    }

    public function scopeIsUser($query, $ignoreBlocked = false)
    {
        return $query
            ->has('userRole')
            ->with('userRole')
            ->when(!$ignoreBlocked, function ($q) {
                return $q->where('blocked', false);
            });
    }

    public function scopeNotUser($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('level', '<', 4);
        });
    }

    public function scopeIsVisitor($query)
    {
        return $query->has('visitorRole')->with('visitorRole');
    }

    public function scopeActive($query)
    {
        return $query->where('users.active', true)
            ->where('users.blocked', false);
    }

    public function scopeNotActive($query)
    {
        return $query->where('users.active', false);
    }

    public function scopeStatus($query, $status)
    {
        switch ($status) {
            case 'ACTIVE':
                return $query->where('users.blocked', false);
                break;
            case 'INACTIVE':
                return $query->where('users.blocked', true);
                break;
            default:
                return $query;
                break;
        }
    }

    public function scopeState($query, $state)
    {
        switch ($state) {
            case 'ACTIVE':
                $query->whereHas('loginAttempts', function ($q) {
                    $q->limit(1)->where('login_attempts.created_at', '>', Carbon::now()->subDays(8));
                });
                break;
            case 'PASIVE':
                $query->whereHas('loginAttempts', function ($q) {
                    $q->limit(1)->where('login_attempts.created_at', '<=', Carbon::now()->subDays(8));
                })->orHas('loginAttempts', '<');
                break;
            default:
                return $query;
                break;
        }
    }

    public function getLastKnownLatitudeAttribute()
    {
        return $this->positions()->first()->latitude ?? null;
    }

    public function getLastKnownLongitudeAttribute()
    {
        return $this->positions()->first()->longitude ?? null;
    }

    public function userNotifications()
    {
        return $this->notifications()->filterForAppWithDate()->get()->merge(
            Notification::forAction()->filterForAppWithDate()->whereIn('action_id', $this->actions()->pluck('id'))->get())->merge(
            Notification::forOperator()->filterForAppWithDate()->whereIn('operator_id', $this->travels()->pluck('operator_id'))->get()
        );
    }

    public function getEarnedPasifyPointsAttribute()
    {
        return $this->actions()->get()->pluck('pivot')->sum('points');
    }

    public function getExchangedPasifyPointsAttribute()
    {
        return $this->prices()->withTrashed()->get()->pluck('pivot')->sum('ammount');
    }

    public function getPasifyPointsAttribute()
    {
        return $this->earned_pasify_points - $this->exchanged_pasify_points;
    }

    public function claimPrice(Price $price)
    {
        $this->prices()->attach($price, ['ammount' => $price->ammount]);
        $this->notify(new ClaimedPriceNotification($price));
        return $price;
    }

    public function transformToIndicator()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->userProfile->phone,
        ];
    }

    /**
     * Get if a user can use a specific route
     * @param  string $route
     * @return boolean
     */
    public function canUseRoute($route = null)
    {
        if ($route) {
            return $this
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('role_web_route_permissions', 'role_user.role_id', '=', 'role_web_route_permissions.role_id')
                ->join('web_routes', 'role_web_route_permissions.web_route_id', '=', 'web_routes.id')
                ->where('user_id', $this->id)
                ->where('web_routes.name', $route)
                ->exists();
        }

        return false;
    }
}
