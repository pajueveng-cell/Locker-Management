@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Locker Detail</h1>
    <p>Locker assignment management</p>
</div>

@if(session('success'))
    <div class="alert alert-success" style="margin-bottom: 16px;">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 16px;">
        <ul style="margin: 0; padding-left: 18px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="locker-detail-card">

    <div class="locker-detail-header">
        <div class="locker-big-icon">
            🔒
        </div>

        <div>
            <h2>{{ $locker->locker_number }}</h2>
            <p>{{ strtoupper($locker->gender) }} LOCKER</p>
        </div>
    </div>

    <div class="locker-info-grid">
        <div class="info-box">
            <label>Locker Number</label>
            <h3>{{ $locker->locker_number }}</h3>
        </div>

        <div class="info-box">
            <label>Gender</label>
            <h3>{{ ucfirst($locker->gender) }}</h3>
        </div>

        <div class="info-box">
            <label>Status</label>
            <h3>
                <span class="locker-status {{ $locker->status }}">
                    {{ strtoupper($locker->status) }}
                </span>
            </h3>
        </div>

        <div class="info-box">
            <label>Location</label>
            <h3>{{ $locker->location ?? '-' }}</h3>
        </div>
    </div>

    {{-- Form Update Status Terpisah (misal: PROBLEM -> AVAILABLE) --}}
    <div class="assign-box" style="margin-bottom: 20px;">
        <h3>Update Locker Status</h3>

        @if(strtolower($locker->status) === 'problem')
            <form method="POST" action="{{ route('lockers.updateStatus', $locker) }}" style="display: inline-block; margin-right: 10px;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="available">
                <button type="submit" class="btn-add">Set Available</button>
            </form>
        @endif

        <form method="POST" action="{{ route('lockers.updateStatus', $locker) }}" style="display: inline-flex; gap: 8px; align-items: center; flex-wrap: wrap;">
            @csrf
            @method('PATCH')

            <select name="status" class="form-control" style="width: auto;" required>
                <option value="available" {{ strtolower($locker->status) === 'available' ? 'selected' : '' }}>AVAILABLE</option>
                <option value="occupied" {{ strtolower($locker->status) === 'occupied' ? 'selected' : '' }}>OCCUPIED</option>
                <option value="problem" {{ strtolower($locker->status) === 'problem' ? 'selected' : '' }}>PROBLEM</option>
            </select>

            <button type="submit" class="btn-add">Update Status</button>
        </form>
    </div>

    @if($locker->employee)

        <div class="assigned-box">
            <h3>Current Employee</h3>

            <div class="employee-detail">
                <div class="avatar">
                    {{ strtoupper(substr($locker->employee->name, 0, 1)) }}
                </div>

                <div>
                    <h4>{{ $locker->employee->name }}</h4>
                    <p>ID : {{ $locker->employee->employee_number }}</p>
                    <p>Department : {{ $locker->employee->department }}</p>
                </div>
            </div>
        </div>

    @else

        <div class="assign-box">
            <h3>Assign Employee</h3>

            @if(strtolower($locker->status) === 'problem')
                <p style="color: #dc2626; margin-bottom: 10px;">
                    Loker sedang berstatus PROBLEM. Ubah status menjadi AVAILABLE terlebih dahulu sebelum assign employee.
                </p>
            @endif

            <form method="POST" action="{{ route('lockers.update', $locker) }}">
                @csrf
                @method('PUT')

                <label>Select Employee</label>

                <select name="employee_id" class="form-control" required {{ strtolower($locker->status) === 'problem' ? 'disabled' : '' }}>
                    <option value="">-- Select Employee --</option>

                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->employee_number }} - {{ $employee->name }}
                        </option>
                    @endforeach
                </select>

                <br>

                <button type="submit" class="btn-add" {{ strtolower($locker->status) === 'problem' ? 'disabled' : '' }}>
                    Assign Locker
                </button>
            </form>
        </div>

    @endif

</div>

@endsection