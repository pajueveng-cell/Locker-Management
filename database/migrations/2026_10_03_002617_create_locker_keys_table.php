<?php


use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



return new class extends Migration
{


public function up(): void
{


Schema::create('locker_keys', function(Blueprint $table){



$table->id();





/*
|--------------------------------------------------------------------------
| Locker Relation
|--------------------------------------------------------------------------
*/


$table->foreignId('locker_id')

      ->constrained()

      ->cascadeOnDelete();





/*
|--------------------------------------------------------------------------
| Key Information
|--------------------------------------------------------------------------
*/


$table->string('key_number');



$table->enum('key_status',
[
'single',
'duplicate'
])
->default('single');




$table->enum('condition',
[
'good',
'lost',
'damaged'
])
->default('good');





$table->text('note')

->nullable();





$table->timestamps();



});


}




public function down(): void
{


Schema::dropIfExists('locker_keys');


}


};