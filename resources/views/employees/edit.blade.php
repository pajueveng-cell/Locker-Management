@extends('layouts.app')


@section('content')


<div class="page-header">

    <h1>Edit Employee</h1>

    <p>
        Update employee information and department data
    </p>

</div>



<div class="employee-card">


<form method="POST"
action="{{ route('employees.update',$employee) }}">


@csrf

@method('PUT')



<div class="row">



    <!-- Employee ID -->

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Employee ID
        </label>


        <input

        type="text"

        class="form-control"

        value="{{ $employee->employee_number }}"

        readonly>


    </div>




    <!-- Name -->


    <div class="col-md-6 mb-3">


        <label class="form-label">

            Employee Name

        </label>


        <input

        type="text"

        name="name"

        class="form-control"

        value="{{ $employee->name }}"

        required>


    </div>





    <!-- Gender -->


    <div class="col-md-6 mb-3">


        <label class="form-label">

            Gender

        </label>


        <select

        name="gender"

        class="form-control"

        required>


            <option value="male"

            {{ $employee->gender == 'male' ? 'selected' : '' }}>

            Male

            </option>



            <option value="female"

            {{ $employee->gender == 'female' ? 'selected' : '' }}>

            Female

            </option>



        </select>


    </div>





    <!-- Department -->


    <div class="col-md-6 mb-3">


        <label class="form-label">

            Department

        </label>



        <select

        name="department"

        class="form-control"

        required>


            <option value="">
                -- Select Department --
            </option>


            <option value="HCA"
            {{ $employee->department == 'HCA' ? 'selected':'' }}>
                HCA
            </option>



            <option value="Finance"
            {{ $employee->department == 'Finance' ? 'selected':'' }}>
                Finance
            </option>



            <option value="PC"
            {{ $employee->department == 'PC' ? 'selected':'' }}>
                PC
            </option>



            <option value="Maintenance"
            {{ $employee->department == 'Maintenance' ? 'selected':'' }}>
                Maintenance
            </option>



            <option value="PED"
            {{ $employee->department == 'PED' ? 'selected':'' }}>
                PED
            </option>



            <option value="Metal"
            {{ $employee->department == 'Metal' ? 'selected':'' }}>
                Metal
            </option>



            <option value="PD 1"
            {{ $employee->department == 'PD 1' ? 'selected':'' }}>
                PD 1
            </option>



            <option value="PD 2"
            {{ $employee->department == 'PD 2' ? 'selected':'' }}>
                PD 2
            </option>



            <option value="CSL"
            {{ $employee->department == 'CSL' ? 'selected':'' }}>
                CSL
            </option>



            <option value="Molding"
            {{ $employee->department == 'Molding' ? 'selected':'' }}>
                Molding
            </option>



            <option value="SMT"
            {{ $employee->department == 'SMT' ? 'selected':'' }}>
                SMT
            </option>



            <option value="QA"
            {{ $employee->department == 'QA' ? 'selected':'' }}>
                QA
            </option>



            <option value="Other"
            {{ $employee->department == 'Other' ? 'selected':'' }}>
                Other
            </option>



        </select>


    </div>






    <!-- Position -->


    <div class="col-md-12 mb-3">


        <label class="form-label">

            Position

        </label>



        <input

        type="text"

        name="position"

        class="form-control"

        value="{{ $employee->position }}"

        required>


    </div>



</div>





<div class="mt-4">


<button 
type="submit"

class="btn-add">


Update Employee


</button>



<a href="{{ route('employees.index') }}"

class="btn-cancel">


Cancel


</a>


</div>




</form>


</div>


@endsection