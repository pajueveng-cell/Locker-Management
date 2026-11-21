@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="company-banner"
data-aos="fade-down">


<img src="{{ asset('images/pt_yokogawa.png') }}" alt="PT Yokogawa">


<div class="overlay">


<h1>
Locker Management System
</h1>


<p>
Employee Locker & Key Monitoring Platform
</p>


</div>


</div>





<h2 class="mt-5">

Dashboard Overview

</h2>



<div class="row mt-4">



<div class="col-md-3">


<div class="stat-card"
data-aos="fade-up">


<h5>
Total Locker
</h5>


<h1>
{{$totalLocker}}
</h1>


</div>


</div>



<div class="col-md-3">


<div class="stat-card"
data-aos="fade-up">


<h5>
Used Locker
</h5>


<h1>
{{$usedLocker}}
</h1>


</div>


</div>



<div class="col-md-3">


<div class="stat-card"
data-aos="fade-up">


<h5>
Empty Locker
</h5>


<h1>
{{$emptyLocker}}
</h1>


</div>


</div>



<div class="col-md-3">


<div class="stat-card"
data-aos="fade-up">


<h5>
Problem Locker
</h5>


<h1>
{{$problemLocker}}
</h1>


</div>


</div>



</div>





<div class="row mt-5">



<div class="col-md-6">


<div class="box">


<h4>
Locker Gender
</h4>


<canvas id="genderChart"></canvas>


</div>


</div>





<div class="col-md-6">


<div class="box">


<h4>
Key Information
</h4>


<div class="key-info">


<h3>
Duplicate Key
</h3>


<h1>
{{$duplicateKey}}
</h1>


</div>


</div>


</div>


</div>





</div>





<script>


const ctx =
document.getElementById('genderChart');


new Chart(ctx, {


type:'doughnut',


data:{


labels:[

'Male Locker',

'Female Locker'

],


datasets:[{


data:[

{{$maleLocker}},

{{$femaleLocker}}

]


}]


}


});



</script>



@endsection