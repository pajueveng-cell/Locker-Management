<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Locker;

use Illuminate\Http\Request;



class EmployeeController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Employee List
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        $employees = Employee::with('locker')
            ->latest()
            ->get();



        return view(
            'employees.index',
            compact('employees')
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Create Employee
    |--------------------------------------------------------------------------
    */


    public function create()
    {


        return view(
            'employees.create'
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Recommend Locker
    |--------------------------------------------------------------------------
    */


    public function recommendLocker(Request $request)
    {


        $request->validate([

            'gender'=>'required'

        ]);




        $lockers = Locker::where(

            'gender',

            $request->gender

        )

        ->where(

            'status',

            'available'

        )

        ->whereHas(

            'key',

            function($query){


                $query->where(

                    'key_status',

                    'duplicate'

                );


            }

        )

        ->with('key')

        ->get();






        return response()->json($lockers);



    }









    /*
    |--------------------------------------------------------------------------
    | Store Employee
    |--------------------------------------------------------------------------
    */


    public function store(Request $request)
    {


        $request->validate([


            'employee_number'
                =>'required|unique:employees',


            'name'
                =>'required',


            'gender'
                =>'required',


            'department'
                =>'required',


            'position'
                =>'required',


            'locker_id'
                =>'required|exists:lockers,id'


        ]);







        // Cek locker

        $locker = Locker::findOrFail(
            $request->locker_id
        );




        if($locker->status != 'available')
        {


            return back()

            ->with(
                'error',
                'Locker sudah digunakan'
            );


        }





        // Buat Employee


        $employee = Employee::create([


            'employee_number'
                =>$request->employee_number,


            'name'
                =>$request->name,


            'gender'
                =>$request->gender,


            'department'
                =>$request->department,


            'position'
                =>$request->position


        ]);






        // Assign Locker


        $locker->update([


            'employee_id'
                =>$employee->id,


            'status'
                =>'occupied'


        ]);







        return redirect()

        ->route('employees.index')

        ->with(

            'success',

            'Employee berhasil ditambahkan dan locker berhasil diberikan'

        );


    }









    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */


    public function edit(Employee $employee)
    {


        return view(

            'employees.edit',

            compact('employee')

        );


    }








    /*
    |--------------------------------------------------------------------------
    | Update Employee
    |--------------------------------------------------------------------------
    */


    public function update(
        Request $request,
        Employee $employee
    )
    {



        $request->validate([


            'name'
                =>'required',


            'gender'
                =>'required',


            'department'
                =>'required',


            'position'
                =>'required'


        ]);





        $employee->update([


            'name'
                =>$request->name,


            'gender'
                =>$request->gender,


            'department'
                =>$request->department,


            'position'
                =>$request->position


        ]);





        return redirect()

        ->route('employees.index')

        ->with(

            'success',

            'Employee berhasil diperbarui'

        );


    }









    /*
    |--------------------------------------------------------------------------
    | Delete Employee
    |--------------------------------------------------------------------------
    */


    public function destroy(Employee $employee)
    {


        // kosongkan locker sebelum hapus


        if($employee->locker)
        {


            $employee->locker->update([


                'employee_id'=>null,


                'status'=>'available'


            ]);


        }






        $employee->delete();





        return redirect()

        ->route('employees.index')

        ->with(

            'success',

            'Employee berhasil dihapus'

        );


    }




}