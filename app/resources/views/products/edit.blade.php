@extends('home')
@section('main')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier un produit</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('product.update', $tab[2]->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value="{{ $tab[2]->name }}" />
            </div>

            <div class="form-group">
                <label for="author">Auteur:</label>
                <input type="text" class="form-control" name="author" value="{{ $tab[2]->author }}" />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value="{{ $tab[2]->description }}"/>
            </div>
            <div class="form-group">
                <label for="url_img">Image :</label>
                <input type="text" class="form-control" name="url_img" value="{{ $tab[2]->url_img }}"/>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type_id">
                    @foreach($tab[0] as $type)
                    <option value="{{$type->id}}" @if($type->id == $tab[2]->type_id) selected @endif >{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Catégorie:</label>
                <select class="form-control" name="category_id">
                    @foreach($tab[1] as $category)
                    <option value="{{$category->id}}"  @if($category->id == $tab[2]->category_id) selected @endif >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection
