<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Product;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id'=>'required',
            'product_id'=>'required',
        ]);
        $reservation = new Reservation([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id'),
            'loan_date' => Carbon::now()->toDateTimeString(),

        ]);
        $reservation->save();
        return redirect('/product')->with('success', 'Réservation ajoutée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function convert($id)
    {
        $resa = Reservation::find($id);
        $loan = new Loan([
            'user_id' => $resa->user_id,
            'product_id' => $resa->product_id
        ]);
        $resa->delete();
        $loan->save();
        return redirect('/loan')->with('success', 'Réservation convertie!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Reservation::find($id);
        $product->delete();
        return redirect('/loan')->with('success', 'Réservation supprimée!');
    }
}
