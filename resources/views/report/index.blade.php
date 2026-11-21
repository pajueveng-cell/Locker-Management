@extends('layouts.app')


@section('content')



<div class="page-header">

<h1>
Report System
</h1>


<p>
Locker and Key Management Report
</p>


</div>






<div class="locker-summary">



<div class="summary-card">

<h4>
Total Locker
</h4>

<h2>
{{$totalLocker}}
</h2>

</div>




<div class="summary-card">

<h4>
Available Locker
</h4>

<h2>
{{$availableLocker}}
</h2>

</div>





<div class="summary-card">

<h4>
Occupied Locker
</h4>

<h2>
{{$occupiedLocker}}
</h2>

</div>





<div class="summary-card">

<h4>
Problem Locker
</h4>

<h2>
{{$problemLocker}}
</h2>

</div>




<div class="summary-card">

<h4>
Total Employee
</h4>

<h2>
{{$totalEmployee}}
</h2>

</div>





<div class="summary-card">

<h4>
Duplicate Key
</h4>

<h2>
{{$duplicateKey}}
</h2>

</div>



</div>






<div class="employee-card mt-4">


<a href="{{route('report.pdf')}}"

class="btn-add">

Export PDF

</a>



<a href="{{route('report.excel')}}"

class="btn-add">

Export Excel

</a>



</div>



@endsection