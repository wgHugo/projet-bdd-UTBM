@extends('home')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier un utilisateur</h1>

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
        <form method="post" action="{{ route('user.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>
            @if (Auth::user()->admin)
            <div class="form-group">
                <label for="name">Admin:</label>
                @if ($user->admin)
                    <input type="checkbox" class="form-control" name="admin" checked value="1" />
                @else
                    <input type="checkbox" class="form-control" name="admin" value="1"/>
                @endif
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection
