@extends('layouts.app')

@section('title')
    Virtual markets
@endsection

@section('side_bar')

    @foreach($virtual_markets as $virtual_market)
        <li class="nav-item">
        <a href="/virtual_markets/{{ $virtual_market->id }}">
            {{ $virtual_market->name }}
        </a>
        <div class="linked-stores"></div>
        </li>
    @endforeach

@endsection

@section('content')

@foreach($virtual_markets as $virtual_market)
        <a href="/virtual_markets/{{ $virtual_market->id }}">
            {{ $virtual_market->name }}
        </a>
        <div class="linked-stores"></div>
@endforeach

@endsection
