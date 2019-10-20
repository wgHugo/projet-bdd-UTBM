<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');

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
                    'email'=>'required'
                ]);

                $user = new User([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'admin' => 0
                ]);
                $user->save();
                return redirect('/user')->with('success', 'Utlisateur ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return User::where('id',$id);
     }

    /**
     * Display user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        $user = Auth::user();
        return view('users.profil', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        return view('users.edit', compact('user'));

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
            'email'=>'required|email',
        ]);

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('admin')!= null){
            $user->admin = $request->get('admin');
        }else{
            $user->admin = 0;
        }
        $user->save();

        return redirect('/user')->with('success', 'Utilisateur modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != Auth::user()){
            $user->delete();
            return redirect('/user')->with('success', 'Utilisateur supprimé!');
        }else{
            return redirect('/user')->with('error', 'Vous utilisez ce compte');
        }

    }
}
