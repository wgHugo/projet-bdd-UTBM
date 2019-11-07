<?php

namespace App\Http\Controllers;

use App\Category;
use App\Loan;
use App\Product;
use App\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tab= [User::withCount('loans')->orderBy('loans_count', 'DESC')->paginate(10),
            Product::withCount('loans')->orderBy('loans_count', 'DESC')->paginate(10)];

//        $data['topProductRate'] = [Product::withCount('rates')->orderBy('rates_count')->paginate(10)];

        return view('statistics.index', compact('tab'));
    }
    public function generatePDFProducts()
    {

        $data = ['products' => Product::with('category','type')->get()];
        $pdf = PDF::loadView('exports.productPDF', $data);

        return $pdf->download('Liste_produits.pdf');
    }
    public function generatePDFInOut()
    {
        $loans = Loan::with('user','product')->get();
        $in = $loans->filter(function($obj){
                if (isset($obj->returned_at)&&Carbon::now()->diffInHours($obj->returned_at) < 24){
                    return $obj;
                }
            });
        $out = $loans->filter(function($obj){
            if (Carbon::now()->diffInHours($obj->created_at) < 24){
                return $obj;
            }
        });
        $data = ['in'=> $in,
            'out'=>$out];
        $pdf = PDF::loadView('exports.InOutPDF', $data);

        return $pdf->download('Entrees_Sorties.pdf');
    }
    public function generatePDFUsers()
    {
        $data = ['users' => User::withCount('loans')->get()];
        $pdf = PDF::loadView('exports.userPDF', $data);
        return $pdf->download('Liste_Utilisateurs.pdf');
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
        //
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
}
