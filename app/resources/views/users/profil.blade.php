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
                    <div class="span3">
                        <img class="img-circle"
                             src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                             alt="User Pic">
                    </div>
                    <div class="span6">
                        <strong>{{$user->name}}</strong><br>
                        <table class="table table-condensed table-responsive table-user-information">
                            <tbody>
                            <tr>
                                <td>Email :</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Nomber of loans :</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>Registered since:</td>
                                <td>11/12/2013</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn  btn-primary" type="button" data-toggle="tooltip"> Modifier Information <i class="icon-envelope icon-white"></i></button>
            </div>
        </div>
    </div>
</div>

@endsection

