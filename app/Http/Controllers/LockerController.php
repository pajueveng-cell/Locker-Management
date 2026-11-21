<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Models\Employee;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function index()
    {
        $maleLockers = Locker::where('gender', 'male')->get();
        $femaleLockers = Locker::where('gender', 'female')->get();

        return view('lockers.index', compact('maleLockers', 'femaleLockers'));
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Locker
    |--------------------------------------------------------------------------
    */
    public function show(Locker $locker)
    {
        $employees = Employee::where('gender', $locker->gender)->get();

        return view('lockers.show', compact('locker', 'employees'));
    }

    /*
    |--------------------------------------------------------------------------
    | Assign Locker
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Locker $locker)
    {
        $request->validate([
            'employee_id' => 'required',
        ]);

        $locker->update([
            'employee_id' => $request->employee_id,
            'status' => 'occupied',
        ]);

        return redirect()
            ->route('lockers.index')
            ->with('success', 'Locker berhasil diberikan ke employee');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Status Locker (Misal: problem -> available)
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, Locker $locker)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:available,occupied,problem,AVAILABLE,OCCUPIED,PROBLEM'],
        ]);

        // Samakan casing dengan format di method update() ('occupied' -> lowercase)
        $nextStatus = strtolower($validated['status']);

        $dataToUpdate = [
            'status' => $nextStatus,
        ];

        // Jika dikembalikan ke available, kosongkan employee_id bila ada
        if ($nextStatus === 'available') {
            $dataToUpdate['employee_id'] = null;
        }

        $locker->update($dataToUpdate);

        return back()->with('success', 'Status locker berhasil diperbarui menjadi ' . strtoupper($nextStatus));
    }
}