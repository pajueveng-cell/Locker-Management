<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class LockerKey extends Model
{


protected $fillable=[


'locker_id',

'key_number',

'key_status',

'condition',

'note'


];





public function locker()
{

return $this->belongsTo(
Locker::class
);

}


}