<?php

namespace App\Models;

use App\Services\UserService;
use App\Traits\BaseModelTrait;
use App\Traits\JWTSubjectTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use JWTSubjectTrait;
    use BaseModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usage_policy', 'mobile', 'delivery_address', 'age',
        'language_id', 'city_id', 'sex_id', 'goal_id', 'lifestyle_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function __construct(array $attributes = [])
    {
        $this->initBaseModel();
        parent::__construct($attributes);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->height()->delete();
            $user->weight()->delete();
        });
    }

    public function height() {
        return $this->hasMany('App\Models\UserOption\Height', 'user_id', 'id');
    }

    public function weight() {
        return $this->hasMany('App\Models\UserOption\Weight', 'user_id', 'id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getPersonalData($request)
    {
        $userData = $this->getCollections($request, Auth::id())->first();

        return UserService::addLocation($userData);
    }

    public function updatePersonalData($request)
    {
        $userData = $this->updateOne($request,Auth::id(), 'id');
        if(!$userData) {
            return false;
        }

        return UserService::addLocation($userData);
    }

    public function getUserParameters($request, $weight, $height)
    {
        //TODO - need refactor
        $userData = $this->getCollections($request, Auth::id())
            ->select('users.id', 'users.age', 'users.goal_id', 'users.sex_id', 'users.lifestyle_id')
            ->where('users.id', Auth::id())
            ->first();

        $userData->{"weight"} = $weight->getLastWeight();
        $userData->{"height"} = $height->getLastHeight();

        return $userData;
    }

    public function updateUserParameters($request, $weight, $height)
    {
        //TODO - need refactor
        $userData = $this->updateOne($request, Auth::id(), 'id')
            ->select('users.id', 'users.age', 'users.goal_id', 'users.sex_id', 'users.lifestyle_id')
            ->where('users.id', Auth::id())
            ->first();

        if(!$userData) {
            return false;
        }

        $userData->{"weight"} = $weight->addWeight($request);
        $userData->{"height"} = $height->addHeight($request);

        return $userData;
    }
}
