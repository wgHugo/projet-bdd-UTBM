@extends('home')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Ajouter un utilisateur</h1>
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
      <form method="post" action="{{ route('user.store') }}">
          @csrf
          <div class="form-group">
              <label for="first_name">Nom:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>

              <input type="text" hidden class="form-control" name="password" value="1234"/>
          <button type="submit" class="btn btn-primary-outline">Ajouter un utilisateur</button>
      </form>
  </div>
</div>
</div>
@endsection
