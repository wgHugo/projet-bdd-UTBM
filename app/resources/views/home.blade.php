@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Route::current()->getName() == 'home')
                        <h3 class="panel-title">Bienvenue dans MediaTech</h3>
                    @endif
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
