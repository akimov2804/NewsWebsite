@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="jumbotron">
                <div class="container">
                    <p class="SimpleBlock-p">{!! $act !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
