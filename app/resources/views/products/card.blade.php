@extends('home')
@section('main')

<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="col-sm-12 offset-sm-0">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 align="center" class="panel-title">{{$product->name}}</h1>
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
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <img class="img-circle"
             src="{{$product->url_img}}"
             alt="User Pic">
    </div>

    <div class="col-md-8">
        <div class="span6">
            <p>De : <strong>{{$product->author}}</strong></p>
            <p>Date de sortie : </p>
            <p>Genre : {{$product->category_id}}</p>
            <p>
                <span style="color: orange;" class="fa fa-star"></span>
                <span style="color: orange;" class="fa fa-star"></span>
                <span style="color: orange;" class="fa fa-star"></span>
                <span style="color: orange;" class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <big> 4/5 </big>
            </p>
            <p>Description : {{$product->description}}</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
            <button class="btn  btn-primary" type="button" data-toggle="tooltip"> Réserver <i class="icon-envelope icon-white"></i></button>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
