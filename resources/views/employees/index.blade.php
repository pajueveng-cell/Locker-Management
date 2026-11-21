@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="page-header">

<h1>
Employee Management
</h1>

<p>
Manage employee locker ownership and information
</p>

</div>



<div class="employee-card">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4>
Employee List
</h4>


<a href="{{route('employees.create')}}" 
class="btn-add">

+ Add Employee

</a>


</div>



<div class="table-responsive">


<table class="employee-table">


<thead>

<tr>

<th>No</th>

<th>Employee ID</th>

<th>Name</th>

<th>Gender</th>

<th>Department</th>

<th>Position</th>

<th>Action</th>


</tr>


</thead>



<tbody>


@foreach($employees as $employee)


<tr>


<td>
{{$loop->iteration}}
</td>



<td>
<span class="employee-id">
{{$employee->employee_number}}
</span>
</td>



<td>

<div class="employee-name">

<div class="avatar">

{{ strtoupper(substr($employee->name,0,1)) }}

</div>


{{$employee->name}}

</div>


</td>



<td>


@if($employee->gender=='male')

<span class="badge male">
Male
</span>


@else


<span class="badge female">
Female
</span>


@endif



</td>



<td>
{{$employee->department}}
</td>



<td>
{{$employee->position}}
</td>




<td>


<a href="{{route('employees.edit',$employee)}}"

class="btn-edit">

Edit

</a>




<form 
action="{{route('employees.destroy',$employee)}}"
method="POST"
style="display:inline">


@csrf

@method('DELETE')


<button 
onclick="return confirm('Delete employee ini?')"

class="btn-delete">

Delete

</button>


</form>


</td>



</tr>



@endforeach



</tbody>


</table>


</div>



</div>



</div>


@endsection