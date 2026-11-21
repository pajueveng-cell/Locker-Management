<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Locker extends Model
{


    use HasFactory;



    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */


    protected $fillable = [


        'locker_number',

        'gender',

        'location',

        'floor',

        'status',

        'problem_note',

        'employee_id'


    ];





    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */



    // Locker dimiliki oleh 1 Employee

    public function employee()
    {

        return $this->belongsTo(
            Employee::class
        );

    }





    // Locker memiliki 1 Key

    public function key()
    {

        return $this->hasOne(
            LockerKey::class
        );

    }







    /*
    |--------------------------------------------------------------------------
    | Scope Filter
    |--------------------------------------------------------------------------
    */



    // Filter Male Locker

    public function scopeMale($query)
    {

        return $query->where(
            'gender',
            'male'
        );

    }






    // Filter Female Locker

    public function scopeFemale($query)
    {

        return $query->where(
            'gender',
            'female'
        );

    }






    // Locker kosong

    public function scopeAvailable($query)
    {

        return $query->where(
            'status',
            'available'
        );

    }






    // Locker terpakai

    public function scopeOccupied($query)
    {

        return $query->where(
            'status',
            'occupied'
        );

    }






    // Locker bermasalah

    public function scopeProblem($query)
    {

        return $query->where(
            'status',
            'problem'
        );

    }

    


}