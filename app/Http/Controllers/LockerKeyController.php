<?php


namespace App\Http\Controllers;


use App\Models\LockerKey;
use App\Models\Locker;

use Illuminate\Http\Request;



class LockerKeyController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Key Monitoring
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        $keys = LockerKey::with('locker')
            ->latest()
            ->get();



        return view(
            'keys.index',
            compact('keys')
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Create Key
    |--------------------------------------------------------------------------
    */


    public function create()
    {


        $lockers = Locker::whereDoesntHave('key')
            ->get();



        return view(
            'keys.create',
            compact('lockers')
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Store Key
    |--------------------------------------------------------------------------
    */


    public function store(Request $request)
    {


        $request->validate([


            'locker_id'=>'required|exists:lockers,id',


            'key_number'=>'required|string|max:100',


            'key_status'=>'required|in:single,duplicate',


            'condition'=>'required|in:good,lost,damaged',


        ]);





        // Cek locker sudah memiliki key

        $existingKey = LockerKey::where(

            'locker_id',

            $request->locker_id

        )->first();



        if($existingKey){


            return back()

            ->with(
                'error',
                'Locker ini sudah memiliki kunci'
            );


        }







        LockerKey::create([


            'locker_id'=>$request->locker_id,


            'key_number'=>$request->key_number,


            'key_status'=>$request->key_status,


            'condition'=>$request->condition,


            'note'=>$request->note


        ]);






        return redirect()

        ->route('keys.index')

        ->with(
            'success',
            'Key berhasil ditambahkan'
        );


    }








    /*
    |--------------------------------------------------------------------------
    | Detail Key
    |--------------------------------------------------------------------------
    */


    public function show(LockerKey $key)
    {


        $key->load('locker.employee');



        return view(
            'keys.show',
            compact('key')
        );


    }








    /*
    |--------------------------------------------------------------------------
    | Edit Key
    |--------------------------------------------------------------------------
    */


    public function edit(LockerKey $key)
    {


        return view(
            'keys.edit',
            compact('key')
        );


    }








    /*
    |--------------------------------------------------------------------------
    | Update Key
    |--------------------------------------------------------------------------
    */


    public function update(
        Request $request,
        LockerKey $key
    )
    {


        $request->validate([


            'key_number'=>'required',


            'key_status'=>'required',


            'condition'=>'required'


        ]);





        $key->update([


            'key_number'=>$request->key_number,


            'key_status'=>$request->key_status,


            'condition'=>$request->condition,


            'note'=>$request->note


        ]);






        return redirect()

        ->route('keys.index')

        ->with(
            'success',
            'Key berhasil diperbarui'
        );


    }








    /*
    |--------------------------------------------------------------------------
    | Delete Key
    |--------------------------------------------------------------------------
    */


    public function destroy(LockerKey $key)
    {


        $key->delete();



        return back()

        ->with(
            'success',
            'Key berhasil dihapus'
        );


    }



}