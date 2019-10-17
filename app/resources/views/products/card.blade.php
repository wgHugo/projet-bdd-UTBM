@extends('home')
@section('main')

    <div class="row">
        <div class="col-xs-4 item-photo">
            <img
                style="max-width:100%;"
                src="https://amc-theatres-res.cloudinary.com/v1562680032/amc-cdn/production/2/movies/56400/56408/PosterDynamic/83473.jpg"
                alt="Film dora"
            />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">
            <h2>{{$product->name}}</h2>
            <h5 style="color:#337ab7">de <a href="#"><big>{{$product->author}}</big></a></h5>

            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success">Réservé</button>
            </div>
        </div>
    </div>
@endsection
