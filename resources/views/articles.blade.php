@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach($data as $el)
                <div class="card" style="width: 18rem; height: 22rem">
                    <img src="{{$el->image}}" class="card-img-top" alt="..." width=18rem height=150rem>
                    <div class="card-body">
                        <p class="card-text">{{$el->title}}</p>
                        <a href="{{$el->url}}" class="btn btn-primary" >More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
