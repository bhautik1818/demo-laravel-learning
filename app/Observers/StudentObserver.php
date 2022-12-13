<?php

namespace App\Observers;

use App\student;
use App\Mail\SendMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class StudentObserver
{
    /**
     * Handle the student "created" event.
     *
     * @param  \App\student  $student
     * @return void
     */
    public function created(student $student)
    {
        //
    }

    /**
     * Handle the student "updated" event.
     *
     * @param  \App\student  $student
     * @return void
     */
    public function updated(student $student)
    {
        //
    }

    /**
     * Handle the student "deleted" event.
     *
     * @param  \App\student  $student
     * @return void
     */
    public function deleted(student $student)
    {
        // $user = User::findOrFail($student->id)->first();
        // User::where('id','=',$user->id)->delete();
        // Mail::to($user->email)->send(new SendMail($user));
    }

    /**
     * Handle the student "restored" event.
     *
     * @param  \App\student  $student
     * @return void
     */
    public function restored(student $student)
    {
        //
    }

    /**
     * Handle the student "force deleted" event.
     *
     * @param  \App\student  $student
     * @return void
     */
    public function forceDeleted(student $student)
    {
        //
    }
}