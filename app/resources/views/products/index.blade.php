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
        <h1 class="display-3">Produits</h1>
        @if (Auth::user()->admin)
        <a href="{{ route('product.create')}}" class="btn btn-primary">
            <span class="fa fa-plus" aria-hidden="true"></span> Produit
        </a>
        @endif
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
                <td>Actions</td>
                @endif
                <td colspan = 2>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tab[2] as $product)
            <tr>
                @if (Auth::user()->admin)
                <td> {{$product->id}} </td>
                @endif
                <td><a href={{ route('product.card', $product->id)}}">{{$product->name}}</a></td>
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
                    <a title="Modifier" href="{{ route('product.edit', $product->id)}}" class="btn btn-primary pull-left">
                        <span class="fa fa-wrench fa-lg" aria-hidden="true"></span>
                    </a>
                    <form action="{{ route('product.destroy', $product->id)}}" method="post" class="pull-left">
                        @csrf
                        @method('DELETE')
                        <button title="Supprimer" class="btn btn-danger" type="submit">
                            <span class="fa fa-trash-o fa-lg" aria-hidden="true"></span>
                        </button>
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

