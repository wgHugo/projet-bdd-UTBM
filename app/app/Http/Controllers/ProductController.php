<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::where('type', 1)->get();
        $types = Category::where('type', 0)->get();
        $tab = [$types, $categories, $products];
        return view('products.index', compact('tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 1)->get();
        $types = Category::where('type', 0)->get();
        $tab = [$types, $categories];
        return view('products.create', compact('tab'));
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
            'author'=>'required',
            'type_id'=>'required',
            'category_id'=>'required'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'author' => $request->get('author'),
            'type_id' => $request->get('type_id'),
            'category_id' => $request->get('category_id')
        ]);
        $product->save();
        return redirect('/product')->with('success', 'Produit ajouté!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Product::find($id);

    }

    /**
     * Display product information.
     *
     * @return \Illuminate\Http\Response
     */
    public function card($id)
    {
        $product = Product::find($id);
        return view('products.card', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view('products.edit', compact('product'));
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
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'type_id'=>'required',
            'category_id'=>'required'
        ]);

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->author = $request->get('author');
        $product->type_id = $request->get('type_id');
        $product->category_id = $request->get('category_id');
        $product->save();

        return redirect('/product')->with('success', 'Produit modifié!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('success', 'Produit supprimé!');

    }
}
