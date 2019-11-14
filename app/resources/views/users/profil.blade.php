@extends('home')
@section('main')

<div class="row">
    <div class="col-sm-8 offset-sm-2">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Profil</h3>
            </div>

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
            <div class="panel-body">
                <div class="row-fluid">
                    <div class="span6">
                        <strong>{{$user->name}}</strong><br>
                        <table class="table table-condensed table-responsive table-user-information">
                            <tbody>
                            <tr>
                                <td>Email :</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Nombre de reservations</td>
                                <td>{{$user->nbResa}}</td>
                            </tr>
                            <tr>
                                <td>Membre depuis:</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('user.edit', Auth::user()->id)}}" class="btn  btn-primary" type="button" data-toggle="tooltip">Modifier ses informations <i class="icon-envelope icon-white"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection

