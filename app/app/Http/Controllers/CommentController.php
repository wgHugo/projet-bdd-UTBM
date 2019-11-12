<?php

namespace App\Http\Controllers;

use App\Product;
use App\Comment;
use Illuminate\Http\Request;



class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment');
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
            'title'=>'required',
            'content'=>'required',
            'mark'=>'required',
        ]);

        $comment = new Comment([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'mark' => $request->get('mark'),
            'product_id' => $request->get('product_id'),
            'user_id' => auth()->user()->id,
        ]);

        $comment->save();
        return redirect('/product/card'.$request->get('product_id'))->with('success', 'Commentaire ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('show', compact('comment'));
    }
}
