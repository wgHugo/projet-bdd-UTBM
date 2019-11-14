<?php

namespace App\Http\Controllers;

use App\Category;
use App\Loan;
use App\Product;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
       return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name'=>'required',
            'type'=>'required'
        ]);

        $category = new Category([
            'name' => $request->get('name'),
            'type' => $request->get('type')
        ]);
        $category->save();
        return redirect('/category')->with('success', 'Catégorie ajoutée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function card($id)
    {
        $products= Product::where('category_id',$id)->orWhere('type_id',$id)->get();
        $categories = Category::where('type', 1)->get();
        $types = Category::where('type', 0)->get();
        $resas = Reservation::all();
        $emprunts = Loan::all();
        foreach ($products as $product){
            $product->available = true;
            foreach ($resas as $resa){
                if ($resa->product_id == $product->id){
                    if (Carbon::create($resa->loan_date)->addDays(7)->isAfter(now()))
                        $product->available = false;
                }
            }
            foreach ($emprunts as $emprunt){
                if ($emprunt->product_id == $product->id){
                    if ($emprunt->returned_at =="")
                        $product->available = false;
                }
            }
        }
        $tab = [$types, $categories, $products];
        return view('products.index', compact('tab'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'name'=>'required',
        'type'=>'required'
    ]);

        $category = Category::find($id);
        $category->name =  $request->get('name');
        $category->type = $request->get('type');
        $category->save();

        return redirect('/category')->with('success', 'Catégorie modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Catégorie supprimée!');
    }
}
