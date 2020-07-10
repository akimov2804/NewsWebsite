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
             <h1>HI, {{Auth::user()->name}}!</h1>
                <p>Every day, we bring you the most important news and feature stories from hundreds of sources in Russia and across the former Soviet Union. Our team includes some of Russia’s top professionals in news and reporting. We value our independence and strive to be a reliable, trusted outlet for verified, unbiased information about Russia and the former Soviet Union, as well as a source for sharp insights about one of the world’s most enigmatic regions.</p>
          </div>
        </div>
    </div>
</div>
@endsection
