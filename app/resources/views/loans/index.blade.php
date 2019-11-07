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
    @if (Auth::user()->admin)
    <a href="{{ route('loan.create')}}" class="btn btn-primary">Créer un emprunt</a>
    @endif
    @if(sizeof($tab[1])>0)
    <h3 class="display-3">Réservations en cours</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            @if (Auth::user()->admin)
            <td>Client</td>
            @endif
            <td>Oeuvre</td>
            <td>Date de réservation</td>
            <td>Date d'expiration</td>
            <td colspan = 2>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($tab[1] as $resa)
        <tr>
            <td>{{$resa->id}}</td>
            @if (Auth::user()->admin)
            <td>{{$resa->user}}</td>
            @endif
            <td>{{$resa->product}}</td>
            <td>{{$resa->loan_date}}</td>
            <td>{{$resa->expire_date}}</td>
            <td>
                @if(Auth::user()->admin)
                <form action="{{ route('reservation.convert', $resa->id)}}" method="post">
                    @csrf
                    @method('GET')
                    <button class="btn btn-secondary" type="submit">Convertir en emprunt</button>
                </form>
                @endif
                <form action="{{ route('reservations.destroy', $resa->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody></table>
    @endif
    @if(sizeof($tab[0])>0)
    <h3 class="display-3">Emprunts en cours</h3>
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
            <td colspan = 2>Status</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tab[0] as $loan)
            <tr>
                <td>{{$loan->id}}</td>
                @if (Auth::user()->admin)
                    <td>{{$loan->client}}</td>
                @endif
                <td>{{$loan->product}}</td>
                <td>{{$loan->dateDebut}}</td>
                <td>{{$loan->return_forecast}}</td>
                <td>{{$loan->returned_at}}</td>
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
            </tr>
        @endforeach
    </tbody>
  </table>
    @endif
    @if(sizeof($tab[2])>0)
    <h3 class="display-3">Emprunts passés</h3>
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
            <td colspan = 2>Status</td>
        </tr>
        </thead>
        <tbody>
        @foreach($tab[2] as $loan)
        <tr>
            <td>{{$loan->id}}</td>
            @if (Auth::user()->admin)
            <td>{{$loan->client}}</td>
            @endif
            <td>{{$loan->product}}</td>
            <td>{{$loan->dateDebut}}</td>
            <td>{{$loan->return_forecast}}</td>
            <td>{{$loan->returned_at}}</td>
            @if(Auth::user()->admin)
            <td>
                <button class="btn btn-danger" disabled>Récupéré!</button>
            </td>
            @else
            <td>
                <button class="btn btn-danger" disabled>Rendu!</button>
            </td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
<div>
</div>
@endsection
