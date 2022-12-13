<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'dob',
    ];


//delete user after delete student.    
//     protected static function boot()
//     {
//         parent::boot();
//         static::deleted(function () {
//             User::where('id', '=', 1)->first()->delete();
//         });
//     }
}