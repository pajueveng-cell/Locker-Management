<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        Locker Management System
    </title>


    <!-- Bootstrap -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet">


    <!-- Custom CSS -->
  <link 
href="{{ asset('css/style.css?v=99') }}" 
rel="stylesheet">

    <!-- AOS Animation -->
    <link 
        href="https://unpkg.com/aos@2.3.1/dist/aos.css" 
        rel="stylesheet">


</head>


<body>


<div class="wrapper">


    @include('layouts.sidebar')


    <main class="content">

        @yield('content')

    </main>


</div>




<!-- Bootstrap JS -->
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



<!-- Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



<script>

AOS.init({

    duration:800,

    once:true

});

</script>



</body>


</html>