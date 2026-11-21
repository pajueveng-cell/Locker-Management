@extends('layouts.app')


@section('content')


<div class="page-header">

<h1>
Add Locker Key
</h1>


<p>
Register new locker key information
</p>


</div>




<div class="key-card">



<form method="POST"

action="{{ route('keys.store') }}">


@csrf





<div class="mb-3">


<label class="form-label">

Locker

</label>



<select

name="locker_id"

class="form-control"

required>



<option value="">

-- Select Locker --

</option>



@foreach($lockers as $locker)


<option value="{{ $locker->id }}">


{{ $locker->locker_number }}

-

{{ strtoupper($locker->gender) }}


</option>


@endforeach



</select>


</div>






<div class="mb-3">


<label class="form-label">

Key Number

</label>



<input

type="text"

name="key_number"

class="form-control"

placeholder="Example: KEY-M001"

required>



</div>








<div class="mb-3">


<label class="form-label">

Key Status

</label>



<select

name="key_status"

class="form-control">


<option value="single">

Single

</option>



<option value="duplicate">

Duplicate

</option>


</select>



</div>








<div class="mb-3">


<label class="form-label">

Condition

</label>



<select

name="condition"

class="form-control">


<option value="good">

Good

</option>



<option value="lost">

Lost

</option>



<option value="damaged">

Damaged

</option>


</select>


</div>







<div class="mb-3">


<label class="form-label">

Note

</label>



<textarea

name="note"

class="form-control"

rows="4"

placeholder="Additional information">

</textarea>


</div>






<button class="btn-add">

Save Key

</button>




<a href="{{ route('keys.index') }}"

class="btn-cancel">

Cancel

</a>




</form>


</div>



@endsection