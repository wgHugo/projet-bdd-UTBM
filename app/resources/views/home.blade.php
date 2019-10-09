@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('user.index')}}" class="btn btn-primary">Utilisateurs</a>
                    <a href="{{ route('category.index')}}" class="btn btn-primary">Catégories</a>
                    <a href="{{ route('product.index')}}" class="btn btn-primary">Produits</a>
                    <a href="{{ route('loan.index')}}" class="btn btn-primary">Réservations</a>
                    <a href="{{ route('loan.index')}}" class="btn btn-primary">Statistiques</a>
                    <input type="search" placeholder="Trouver quelque chose" class="bg-light">

                    @yield('main')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
