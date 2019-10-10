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
    <a href="{{ route('product.create')}}" class="btn btn-primary">Créer</a>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom</td>
          <td>Auteur</td>
          <td>Type</td>
          <td>Catégorie</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tab[2] as $product)
        <tr>
            <td>{{$product->id}}</td>
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
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
