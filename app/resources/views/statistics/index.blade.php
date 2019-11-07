@extends('home')

@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->get('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <h1 class="display-3">Statistiques</h1>
        <h3>Top 10 des utilisateurs empruntant le plus</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Titre de l'oeuvre</td>
                <td>Nb d'emprunts</td>
            </tr>
            </thead>

            <tbody>
            @foreach($tab[0] as $product)
            <tr>
                <td> {{$product->name}}</td>
                <td> {{$product->loans_count}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Top 10 des produits les plus empruntés</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Nb d'emprunts</td>
            </tr>
            </thead>

            <tbody>
            @foreach($tab[1] as $user)
            <tr>
                <td> {{$user->name}}</td>
                <td> {{$user->loans_count}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button class="btn btn-lg btn-secondary">Générer la liste des oeuvres</button>
        <button class="btn btn-lg btn-secondary">Générer la liste des utilisateurs</button>
        <button class="btn btn-lg btn-secondary">Générer le rapport Entrées/Sorties</button>
        <div>
        </div>
        @endsection
