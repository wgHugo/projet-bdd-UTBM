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
        <h1 class="display-3">Résultats recherche</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                @if (Auth::user()->admin)
                <td>ID</td>
                @endif
                <td>Nom</td>
                <td>Auteur</td>
                <td>Type</td>
                <td>Catégorie</td>
                @if (Auth::user()->admin)
                <td colspan = 2>Actions</td>
                @endif
                <td colspan = 2>Status</td>
            </tr>
            </thead>
            <tbody>
            @foreach($tab[2] as $product)
            <tr>
                @if (Auth::user()->admin)
                <td><a href={{ route('product.card', $product->id)}}"> {{$product->id}} </a></td>
                @endif
                <td>{{$product->name}}</td>
                <td>{{$product->author}}</td>
                @foreach($tab[0] as $type)
                @if($type->id==$product->type_id)
                <td>{{$type->name}}</td>
                @endif
                @endforeach
                @foreach($tab[1] as $category)
                @if($category->id==$product->category_id)
                <td>{{$category->name}}</td>
                @endif
                @endforeach
                @if (Auth::user()->admin)
                <td>
                    <a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Modifier</a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
                @endif
                @if(!$product->available)
                <td>
                    <button class="btn btn-secondary" disabled>Indisponible</button>
                </td>
                @else
                <td>
                    <button class="btn btn-success" disabled>Disponible</button>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
