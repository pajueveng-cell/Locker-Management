<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use App\Models\Locker;



class LockerSeeder extends Seeder
{


    public function run()
    {


        /*
        |--------------------------------------------------------------------------
        | MALE LOCKER
        |--------------------------------------------------------------------------
        */


        for($i = 1; $i <= 100; $i++)
        {


            Locker::create([


                'locker_number' => 
                'M-' . str_pad($i,3,'0',STR_PAD_LEFT),


                'gender' => 'male',


                'status' => 'available',


                'location' => 'Male Locker Room',


                'floor' => '1'


            ]);


        }





        /*
        |--------------------------------------------------------------------------
        | FEMALE LOCKER
        |--------------------------------------------------------------------------
        */


        for($i = 1; $i <= 100; $i++)
        {


            Locker::create([


                'locker_number' => 
                'F-' . str_pad($i,3,'0',STR_PAD_LEFT),


                'gender' => 'female',


                'status' => 'available',


                'location' => 'Female Locker Room',


                'floor' => '1'


            ]);


        }





        /*
        |--------------------------------------------------------------------------
        | EXAMPLE PROBLEM LOCKER
        |--------------------------------------------------------------------------
        |
        | Contoh beberapa loker bermasalah
        | untuk testing dashboard
        |
        */


        Locker::where(
            'locker_number',
            'M-005'
        )->update([


            'status'=>'problem'


        ]);




        Locker::where(
            'locker_number',
            'M-015'
        )->update([


            'status'=>'problem'


        ]);




        Locker::where(
            'locker_number',
            'F-010'
        )->update([


            'status'=>'problem'


        ]);




    }


}