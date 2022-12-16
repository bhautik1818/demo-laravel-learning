<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'phone',
        'dob',
        'subscription',
        'otp',
        'is_verified'
    ];
    public function getUserNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setUserNameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }


    public function getFullNameAttribute()
    {
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }

     public function subscriptiondays($days)
    {
        $currentDate = Carbon::now()->toDateTimeString();
        $expireDateTime = Carbon::parse($currentDate)->addDays($days);
        return $expireDateTime;
    }

    protected $appends = ['fullname'];

    //delete user after delete student.    
    //     protected static function boot()
    //     {
    //         parent::boot();
    //         static::deleted(function () {
    //             User::where('id', '=', 1)->first()->delete();
    //         });
    //     }


}