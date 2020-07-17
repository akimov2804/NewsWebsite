@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach($sportNews->channel->item as $news)
                    <div class="card" style="width: 18rem; height: 22rem">
                        <img src="https://i.eurosport.com/2015/11/12/1731323-36624693-1600-900.png" class="card-img-top" alt="..." width=18rem height=150rem>
                        <div class="card-body">
                            <p class="card-text">{{ $news->title }}</p>
                            <a href="{{$news->link}}" class="btn btn-primary" >More</a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
