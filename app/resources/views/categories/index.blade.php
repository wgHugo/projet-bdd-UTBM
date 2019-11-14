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
    <h1 class="display-3">Catégories</h1>
    <a href="{{ route('category.create')}}" class="btn btn-primary">
        <span class="fa fa-plus" aria-hidden="true"></span> Catégorie
    </a>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom</td>
          <td>Type</td>
          <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            @if($category->type == 0)
            <td>Type de média</td>
            @else
            <td>Catégorie</td>
            @endif
            <td>
                <a title="Modifier" href="{{ route('category.edit', $category->id)}}" class="btn btn-primary pull-left">
                    <span class="fa fa-wrench fa-lg" aria-hidden="true"></span>
                </a>
                <form action="{{ route('category.destroy', $category->id)}}" method="post" class="pull-left">
                    @csrf
                    @method('DELETE')
                    <button title="Supprimer" class="btn btn-danger" type="submit">
                        <span class="fa fa-trash-o fa-lg" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
