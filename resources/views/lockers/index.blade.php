@extends('layouts.app')


@section('content')


<div class="page-header">

<h1>
Locker Management
</h1>

<p>
Monitor employee locker availability
</p>

</div>




<div class="locker-summary">


<div class="summary-card">

<h4>Total Locker</h4>

<h2>
{{ $maleLockers->count() + $femaleLockers->count() }}
</h2>

</div>


<div class="summary-card">

<h4>Male Locker</h4>

<h2>
{{ $maleLockers->count() }}
</h2>

</div>



<div class="summary-card">

<h4>Female Locker</h4>

<h2>
{{ $femaleLockers->count() }}
</h2>

</div>


</div>





<div class="locker-section">


<div class="section-title">

<h2>
Male Locker Room
</h2>

<span>
{{ $maleLockers->count() }} Units
</span>


</div>




<div class="locker-grid">


@foreach($maleLockers as $locker)


<a 
href="{{ route('lockers.show',$locker) }}"
class="locker-card {{ $locker->status }}">


<div class="locker-icon">
🔒
</div>


<h3>
{{ $locker->locker_number }}
</h3>


<span class="locker-status">

{{ strtoupper($locker->status) }}

</span>



</a>


@endforeach



</div>


</div>








<div class="locker-section">


<div class="section-title">

<h2>
Female Locker Room
</h2>


<span>
{{ $femaleLockers->count() }} Units
</span>


</div>





<div class="locker-grid">


@foreach($femaleLockers as $locker)


<a 
href="{{ route('lockers.show',$locker) }}"
class="locker-card {{ $locker->status }}">



<div class="locker-icon">

🔒

</div>



<h3>

{{ $locker->locker_number }}

</h3>



<span class="locker-status">

{{ strtoupper($locker->status) }}

</span>



</a>



@endforeach


</div>


</div>



@endsection