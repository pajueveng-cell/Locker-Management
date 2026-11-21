@extends('layouts.app')


@section('content')


<div class="page-header">

    <h1>
        Add Employee
    </h1>


    <p>
        Register new employee information for locker management system
    </p>

</div>




<div class="employee-card">
    @if ($errors->any())

<div class="alert alert-danger">

<ul>

@foreach ($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif



<form method="POST"

action="{{ route('employees.store') }}">


@csrf



<div class="row">



    <!-- Employee Number -->

    <div class="col-md-6 mb-3">


        <label class="form-label">

            Employee ID

        </label>


        <input

        type="text"

        name="employee_number"

        class="form-control"

        placeholder="Example: 08765"

        required>


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

        placeholder="Enter employee name"

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



            <option value="">
                -- Select Gender --
            </option>


            <option value="male">
                Male
            </option>



            <option value="female">
                Female
            </option>



        </select>


    </div>

    <div class="col-md-12 mb-3">


<label class="form-label">

Recommended Locker

</label>


<select

name="locker_id"

id="lockerSelect"

class="form-control">


<option>

-- Choose Gender First --

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


            <option value="HCA">
                HCA
            </option>



            <option value="Finance">
                Finance
            </option>



            <option value="PC">
                PC
            </option>



            <option value="Maintenance">
                Maintenance
            </option>



            <option value="PED">
                PED
            </option>



            <option value="Metal">
                Metal
            </option>



            <option value="PD 1">
                PD 1
            </option>



            <option value="PD 2">
                PD 2
            </option>



            <option value="CSL">
                CSL
            </option>



            <option value="Molding">
                Molding
            </option>



            <option value="SMT">
                SMT
            </option>



            <option value="QA">
                QA
            </option>



            <option value="Other">
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

        placeholder="Example: Operator / Staff / Engineer"

        required>



    </div>



</div>







<div class="mt-4">


<button

type="submit"

class="btn-add">


Save Employee


</button>




<a href="{{ route('employees.index') }}"

class="btn-cancel">


Cancel


</a>



</div>





</form>



</div>

<script>


document
.querySelector('[name="gender"]')
.addEventListener(
'change',
function(){


let gender=this.value;



fetch(
"{{ route('employees.recommendLocker') }}",
{

method:"POST",

headers:{


'Content-Type':
'application/json',

'X-CSRF-TOKEN':
'{{csrf_token()}}'

},


body:JSON.stringify({

gender:gender

})


}

)

.then(response=>response.json())


.then(data=>{


let select=
document.getElementById(
'lockerSelect'
);



select.innerHTML=
'<option>Select Locker</option>';



data.forEach(locker=>{


select.innerHTML +=

`
<option value="${locker.id}">

${locker.locker_number}

- Key Duplicate

</option>

`;


});



});


});


</script>


@endsection