@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h2>US DOLLAR EXCHANGE RATES TABLE</h2>
                <table class="table tab-content" >
                    <tbody>
                @foreach($dollar as $key => $value)
                    <tr>
                    <td width="100px">USD</td>
                    <td width="100px">{{$key}}</td>
                    <td width="100px">{{$value}}</td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
