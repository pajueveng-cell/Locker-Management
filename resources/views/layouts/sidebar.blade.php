<div class="sidebar">

    <div class="sidebar-brand">
        <img src="{{ asset('images\logo_yokogawa.png') }}" alt="Logo PT" class="company-logo">
        <div>
            <h3>🔐 LMS</h3>
            <p>Locker Management System</p>
        </div>
    </div>

    <hr>

    <a href="{{ route('dashboard') }}">Dashboard</a>
   <a href="{{route('employees.index')}}">
Employee
</a>
    <a href="{{ route('lockers.index') }}">
    Locker
</a>
   <a href="{{route('keys.index')}}">
Key Monitoring
</a>
    <a href="{{route('report.index')}}">

Report

</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</div>