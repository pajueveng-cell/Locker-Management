@extends('layouts.app')


@section('content')


<div class="page-header">

<h1>
Key Monitoring
</h1>


<p>
Monitor locker key status, duplication and condition
</p>


</div>





<div class="employee-card">



<div class="key-header">


<h3>
Locker Key List
</h3>



<a href="{{route('keys.create')}}"
class="btn-add">

+ Add Key

</a>



</div>







<div class="table-responsive">


<table class="key-table">


<thead>


<tr>


<th>
Locker
</th>


<th>
Key Number
</th>


<th>
Status
</th>


<th>
Condition
</th>


<th>
Note
</th>


<th>
Action
</th>


</tr>


</thead>



<tbody>


@foreach($keys as $key)


<tr>


<td>


<div class="locker-name">


🔒

{{$key->locker->locker_number}}


</div>


</td>




<td>

{{$key->key_number}}

</td>





<td>


@if($key->key_status == 'single')


<span class="key-badge single">

SINGLE

</span>


@else


<span class="key-badge duplicate">

DUPLICATE

</span>


@endif



</td>






<td>



@if($key->condition == 'good')


<span class="condition good">

GOOD

</span>



@elseif($key->condition == 'lost')


<span class="condition lost">

LOST

</span>


@else


<span class="condition damaged">

DAMAGED

</span>


@endif



</td>





<td>

{{$key->note ?? '-'}}

</td>






<td>


<form action="{{route('keys.destroy',$key)}}"

method="POST">


@csrf

@method('DELETE')



<button class="btn-delete">

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


@endsection