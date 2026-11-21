<?php

namespace App\Http\Controllers;


use App\Models\Locker;
use App\Models\LockerKey;


class DashboardController extends Controller
{


public function index()
{


$totalLocker =
Locker::count();



$usedLocker =
Locker::where(
'status',
'occupied'
)->count();



$emptyLocker =
Locker::where(
'status',
'available'
)->count();



$problemLocker =
Locker::where(
'status',
'problem'
)->count();



$maleLocker =
Locker::where(
'gender',
'male'
)->count();



$femaleLocker =
Locker::where(
'gender',
'female'
)->count();



$duplicateKey =
LockerKey::where(
'key_status',
'duplicate'
)->count();



return view(
'dashboard',
compact(

'totalLocker',
'usedLocker',
'emptyLocker',
'problemLocker',
'maleLocker',
'femaleLocker',
'duplicateKey'

));



}


}