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

        <div class="card">
            <div class="card-header"><b>{{ $searchResults->count() }} résultats trouvé pour "{{ request('search') }}"</b></div>

            <div class="card-body">

                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                <div class="card-header" id="headingOne">
                    <h2>
                        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$type}}">
                            {{ ucfirst($type) }}
                        </button>
                    </h2>
                </div>

                <div id="{{$type}}" class="collapse show">
                    <div class="card-body">
                        @foreach($modelSearchResults as $searchResult)
                        <ul>
                            <li><a href="{{'product.card', $searchResult->url }}">{{ $searchResult->title }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
