@extends('home')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier une catégorie</h1>

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
        <form method="post" action="{{ route('category.update', $category->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value={{ $category->name }} />
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type">
                    @if ($category->type == 0)
                        <option selected value="0" >Type de media</option>
                        <option value="1">Catégorie</option>
                    @else
                        <option value="0" >Type de media</option>
                        <option selected value="1">Catégorie</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection
