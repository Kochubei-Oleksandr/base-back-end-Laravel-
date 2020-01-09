<?php

namespace App\Models;

use App\Traits\BaseModelTrait;
use App\Traits\JWTSubjectTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class FoodDeliveryOrganization extends Authenticatable implements JWTSubject
{
    use JWTSubjectTrait;
    use Notifiable;
    use BaseModelTrait;

    protected $fillable = ['email', 'password'];

    public function __construct(array $attributes = [])
    {
        $this->initBaseModel();
        parent::__construct($attributes);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
