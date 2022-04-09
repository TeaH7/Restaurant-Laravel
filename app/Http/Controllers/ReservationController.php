<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(10);
        return view('admin.reservation.index' , [ 'reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|max:60' ,
            'email' => 'required|email' ,
            'phone' => 'required|numeric' ,
            'date' => 'required' ,
            'time' => 'required' ,
            'nr_of_people' => 'required|max:100' ,
            'message' => 'nullable|max:255'
        ]);

        Reservation::create($data);
        return redirect()->route('home')->with('success' , 'Rezervimi u krye me sukses. Ju do te njoftoheni per konfirmimin');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservation.edit' , ['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {

        $data = $request->validate([
            'date' => 'nullable' ,
            'time' => 'nullable' ,
            'nr_of_people' => 'nullable' ,
            'status' => 'nullable'
        ]);

        $reservation->update($data);
        return redirect()->route('admin-reservation')->with('success' , 'Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin-reservation')->with('success' , 'Deleted Succesfully');
    }
}
