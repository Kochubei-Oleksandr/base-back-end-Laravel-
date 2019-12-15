<?php


namespace App\Models;


use App\Traits\JWTSubjectTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class FoodDeliveryOrganization extends Authenticatable implements JWTSubject
{
    use JWTSubjectTrait;
    use Notifiable;

    protected $fillable = ['email', 'password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
