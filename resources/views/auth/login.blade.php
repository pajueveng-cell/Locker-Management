<x-guest-layout>


<style>


*{

box-sizing:border-box;

}


body{

margin:0;

font-family:'Segoe UI',sans-serif;

background:#f4f6fa;

}



/* =========================
   SPLASH SCREEN
========================= */


.splash{


position:fixed;

inset:0;


background:white;


display:flex;

flex-direction:column;


justify-content:center;


align-items:center;


z-index:9999;


animation:splashHide 4s forwards;


}



.splash img{


width:130px;


animation:logoAnimation 3s ease;


}




.splash-title{


margin-top:25px;


font-size:28px;


font-weight:700;


color:#0B1F3A;


}



.splash-text{


color:#64748b;


margin-top:10px;


font-size:14px;


}




@keyframes logoAnimation{


0%{

opacity:0;

transform:scale(.5);

}


50%{

opacity:1;

transform:scale(1.1);

}


100%{

opacity:0;

transform:scale(1);

}


}




@keyframes splashHide{


0%,80%{

opacity:1;

}


100%{

opacity:0;

visibility:hidden;

}


}






/* =========================
   LOGIN PAGE
========================= */


.login-wrapper{


height:100vh;


display:flex;


}



/* LEFT SIDE */


.login-brand{


width:55%;


background:

linear-gradient(

135deg,

#0B1F3A,

#162f52

);



display:flex;


align-items:center;


justify-content:center;


color:white;


}



.brand-content{


text-align:center;


}



.brand-logo{


width:130px;


height:130px;


background:white;


padding:15px;


border-radius:20px;


object-fit:contain;


}



.brand-title{


margin-top:30px;


font-size:42px;


font-weight:800;


color:#F4C430;


}



.brand-sub{


font-size:18px;


color:#cbd5e1;


margin-top:15px;


}




/* RIGHT LOGIN */


.login-area{


width:45%;


display:flex;


justify-content:center;


align-items:center;


}




.login-card{


width:430px;


background:white;


padding:45px;


border-radius:20px;


box-shadow:

0 20px 50px rgba(0,0,0,.15);


}




.login-title{


text-align:center;


font-size:30px;


font-weight:700;


color:#0B1F3A;


}



.login-desc{


text-align:center;


color:#64748b;


margin-bottom:30px;


}



.access-badge{


text-align:center;


margin-bottom:25px;


}



.access-badge span{


background:#fef3c7;


color:#92400e;


padding:8px 18px;


border-radius:20px;


font-size:13px;


font-weight:bold;


}






.form-group{


margin-bottom:20px;


}




.form-group label{


display:block;


margin-bottom:8px;


font-weight:600;


color:#0B1F3A;


}




.form-control{


width:100%;


height:45px;


padding:12px;


border-radius:8px;


border:1px solid #cbd5e1;


}



.form-control:focus{


outline:none;


border-color:#F4C430;


box-shadow:

0 0 0 3px rgba(244,196,48,.2);


}




.login-btn{


width:100%;


height:45px;


margin-top:20px;


background:#0B1F3A;


color:white;


border:none;


border-radius:8px;


font-weight:700;


transition:.3s;


}




.login-btn:hover{


background:#F4C430;


color:#0B1F3A;


transform:translateY(-3px);


}





.footer{


text-align:center;


margin-top:30px;


font-size:12px;


color:#64748b;


}






@media(max-width:900px){


.login-brand{


display:none;


}



.login-area{


width:100%;


}



}






</style>





<!-- SPLASH -->


<div class="splash">


<img src="{{ asset('images/logo_yokogawa.png') }}">


<div class="splash-title">

Locker Management System

</div>


<div class="splash-text">

Initializing System...

</div>


</div>






<!-- LOGIN -->


<div class="login-wrapper">



<div class="login-brand">


<div class="brand-content">


<img

src="{{ asset('images/logo_yokogawa.png') }}"

class="brand-logo">


<h1 class="brand-title">

Locker Management System

</h1>


<p class="brand-sub">

Employee Locker & Key Monitoring Platform

</p>



</div>


</div>







<div class="login-area">


<div class="login-card">



<h2 class="login-title">

Welcome Admin

</h2>




<p class="login-desc">

Administrator access portal

</p>




<div class="access-badge">

<span>

ADMIN ONLY

</span>

</div>







<form method="POST"

action="{{ route('login') }}">


@csrf





<div class="form-group">


<label>

Email

</label>



<input

type="email"

name="email"

class="form-control"

required

autofocus>


</div>






<div class="form-group">


<label>

Password

</label>


<input

type="password"

name="password"

class="form-control"

required>


</div>






<button class="login-btn">


LOGIN


</button>





</form>






<div class="footer">


PT Yokogawa Manufacturing Batam

<br>

Locker Management System


</div>






</div>


</div>



</div>



</x-guest-layout>