<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Product;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userConnected = Auth::user();
        if ($userConnected->admin ==1){
            $loans = Loan::all();
        }else{
            $loans = Loan::where('user_id', $userConnected->id)->get();
        }
        foreach ($loans as $loan){
            $loan->client = Loan::find($loan->id)->user()->value('name');
            $loan->product = Loan::find($loan->id)->product()->value('name');
            $date = new Carbon($loan->created_at);
            $loan->return_forecast = $date->addDays(30)->format('d-m-Y');
            $date1 = new Carbon($loan->created_at);
            $loan->dateDebut = $date1->format('d-m-Y');
            if ($loan->returned_at != ''){
                $date2 = new Carbon($loan->returned_at);
                $loan->returned_at = $date2->format('d-m-Y');
            }
        }
        $resas = Reservation::all();
        foreach ($resas as $resa) {
            $resa->product = Reservation::find($resa->id)->product()->value('name');
            $resa->user = Reservation::find($resa->id)->user()->value('name');
            $resa->expire_date = Carbon::create($resa->loan_date)->addDays(7);
        }
        $resas = $resas->filter(function($obj){
                if ($obj->expire_date->isAfter(now())){
                    return $obj;
                }
        });
        $loansArchived = $loans->filter(function($obj){
            if ($obj->returned_at != ''){
                return $obj;
            }
        });
        $loans = $loans->filter(function($obj){
            if ($obj->returned_at == ''){
                return $obj;
            }
    });
        $tab = [$loans,$resas,$loansArchived];
        return view('loans.index', compact('tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $resas = Loan::all();
        $products = $products->filter(function($obj) use ($resas) {
            $bool = false;
            foreach ($resas as $resa){
                if ($resa->returned_at==''){
                    if ($obj->id == $resa->product_id){
                        $bool = true;
                    }
                }
            }
            if (!$bool){
                return $obj;
            }
        });
        $tab = [$users,$products];
        return view('loans.create', compact('tab'));
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
            'product_id'=>'required'
        ]);

        $loan = new Loan([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id')
        ]);
        $loan->save();
        return redirect('/loan')->with('success', 'Réservation ajoutée!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Loan::find($id);
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
        //
    }
    public function rendre($id)
    {
        $loan = Loan::find($id);
        $loan->returned_at = Carbon::now();
        $loan->save();
        return redirect('/loan')->with('success', 'Oeuvre rendue!');
    }
}
