<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{


    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('lockers', function (Blueprint $table) {


            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */

            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Locker Information
            |--------------------------------------------------------------------------
            */


            // Example:
            // M-001
            // F-001

            $table->string('locker_number')
                  ->unique();



            // Locker category

            $table->enum('gender',
            [
                'male',
                'female'
            ]);




            // Locker location

            $table->string('location')
                  ->nullable();




            // Floor location

            $table->string('floor')
                  ->nullable();





            /*
            |--------------------------------------------------------------------------
            | Locker Status
            |--------------------------------------------------------------------------
            |
            | available = kosong
            | occupied  = digunakan
            | problem   = bermasalah
            |
            */


            $table->enum('status',
            [
                'available',
                'occupied',
                'problem'
            ])
            ->default('available');





            /*
            |--------------------------------------------------------------------------
            | Problem Information
            |--------------------------------------------------------------------------
            */


            $table->text('problem_note')
                  ->nullable();







            /*
            |--------------------------------------------------------------------------
            | Employee Relation
            |--------------------------------------------------------------------------
            */


            $table->foreignId('employee_id')
                  ->nullable()
                  ->constrained('employees')
                  ->nullOnDelete();






            /*
            |--------------------------------------------------------------------------
            | Timestamp
            |--------------------------------------------------------------------------
            */


            $table->timestamps();


        });


    }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('lockers');


    }


};