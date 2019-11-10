@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->title }}</td>
                    <td>
                        <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-primary">Show Comment</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
