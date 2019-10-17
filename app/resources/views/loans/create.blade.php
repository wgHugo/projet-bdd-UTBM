@extends('home')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Ajouter une réservation</h1>
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
      <form method="post" action="{{ route('loan.store') }}">
          @csrf
          <div class="form-group">
              <label for="type">Client:</label>
              <select class="form-control" name="user_id">
                  @foreach($tab[0] as $user)
                  <option value={{$user->id}}>{{$user->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="type">Oeuvre:</label>
              <select class="form-control" name="product_id">
                  @foreach($tab[1] as $product)
                  <option value={{$product->id}}>{{$product->name}}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter une réservation</button>
      </form>
  </div>
</div>
</div>
@endsection
