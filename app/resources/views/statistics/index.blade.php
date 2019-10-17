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
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Utilisateur</td>
                <td>Produit</td>
                <td>Catégorie</td>
            </tr>
            </thead>

            <tbody>
            @for ($i = 0; $i < count($utilisateur); $i++)
            <tr>
                <td> {{$utilisateur[$i]}}</td>
                <td> {{$produit[$i]}}</td>
                <td> {{$categorie[$i]}}</td>
            </tr>
            @endfor
            </tbody>
        </table>

        <div>
        </div>
        @endsection
