<?php


namespace App\Http\Controllers;



use App\Models\Locker;

use App\Models\Employee;

use App\Models\LockerKey;


use PDF;

use Maatwebsite\Excel\Facades\Excel;



class ReportController extends Controller
{



public function index()
{


$data=[


'totalLocker'=>Locker::count(),


'availableLocker'=>Locker::where(
'status',
'available'
)->count(),



'occupiedLocker'=>Locker::where(
'status',
'occupied'
)->count(),



'problemLocker'=>Locker::where(
'status',
'problem'
)->count(),



'totalEmployee'=>Employee::count(),



'totalKey'=>LockerKey::count(),



'duplicateKey'=>LockerKey::where(
'key_status',
'duplicate'
)->count(),



'damagedKey'=>LockerKey::whereIn(
'condition',
[
'lost',
'damaged'
]
)->count()


];




return view(
'report.index',
$data
);


}







public function pdf()
{


$data=[


'lockers'=>Locker::with('employee')->get()


];



$pdf = PDF::loadView(
'report.pdf',
$data
);



return $pdf->download(
'locker-report.pdf'
);



}






public function excel()
{


return Excel::download(

new \App\Exports\LockerExport,

'locker-report.xlsx'

);


}





}