<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{

use HasFactory;



protected $fillable = [

    'employee_number',
    'name',
    'gender',
    'department',
    'position'

];



public function locker()
{

    return $this->hasOne(
        Locker::class
    );

}


}