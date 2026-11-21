<?php

namespace App\Exports;


use App\Models\Locker;

use Maatwebsite\Excel\Concerns\FromCollection;



class LockerExport implements FromCollection
{


public function collection()
{

return Locker::with(
'employee'
)
->get();


}


}