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
    <h1 class="display-3">Emprunts</h1>
    @if (Auth::user()->admin)
        <a href="{{ route('loan.create')}}" class="btn btn-primary">Créer</a>
    @endif
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
            @if (Auth::user()->admin)
                <td>Client</td>
            @endif
          <td>Oeuvre</td>
          <td>Date de début</td>
          <td>Date de retour prévue</td>
          <td>Date de retour effective</td>
            @if (Auth::user()->admin)
                <td colspan = 2>Actions</td>
            @else
                <td colspan = 2>Status</td>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($loans as $loan)
            <tr>
                <td>{{$loan->id}}</td>
                @if (Auth::user()->admin)
                    <td>{{$loan->client}}</td>
                @endif
                <td>{{$loan->product}}</td>
                <td>{{$loan->dateDebut}}</td>
                <td>{{$loan->return_forecast}}</td>
                <td>{{$loan->returned_at}}</td>
                @if ($loan->returned_at == '')
                    @if(Auth::user()->admin)
                        <td>
                            <form action="{{ route('loan.rendre', $loan->id)}}" method="post">
                                @csrf
                                @method('GET')
                                <button class="btn btn-danger" type="submit">Récupérer</button>
                            </form>
                        </td>
                    @else
                        <td>
                            <button class="btn btn-secondary" disabled>En cours</button>
                        </td>
                    @endif
                @else
                    @if(Auth::user()->admin)
                        <td>
                            <button class="btn btn-danger" disabled>Récupéré!</button>
                        </td>
                    @else
                        <td>
                            <button class="btn btn-danger" disabled>Rendu!</button>
                        </td>
                    @endif
                @endif
            </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
