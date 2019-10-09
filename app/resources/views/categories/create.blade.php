@extends('home')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Ajouter une catégorie</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('category.store') }}">
          @csrf
          <div class="form-group">
              <label for="first_name">Nom:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="type">Type:</label>
              <select class="form-control" name="type">
                  <option value="0">Type de media</option>
                  <option value="1">Catégorie</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter une catégorie</button>
      </form>
  </div>
</div>
</div>
@endsection
