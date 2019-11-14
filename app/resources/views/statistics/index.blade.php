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
                <td>#</td>
                <td>Utilisateur</td>
                <td>Nb d'emprunts</td>
            </tr>
            </thead>

            <tbody>
            @foreach($tab[0] as $i=>$user)
            <tr>
                <td>{{$i+1}}</td>
                <td> {{$user->name}}</td>
                <td> {{$user->loans_count}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Top 10 des produits les plus empruntés</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>#</td>
                <td>Titre de l'oeuvre</td>
                <td>Nb d'emprunts</td>
            </tr>
            </thead>

            <tbody>
            @foreach($tab[1] as $i=>$product)
            <tr>
                <td>{{$i+1}}</td>
                <td> {{$product->name}}</td>
                <td> {{$product->loans_count}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('statistic.generatePDFProducts')}}" class="btn btn-secondary">Générer la liste des oeuvres</a>
        <a href="{{ route('statistic.generatePDFUsers')}}" class="btn btn-secondary">Générer la liste des utilisateurs</a>
        <a href="{{ route('statistic.generatePDFInOut')}}" class="btn btn-secondary">Générer le rapport Entrées/Sorties</a>
        <div>
        </div>
        @endsection
