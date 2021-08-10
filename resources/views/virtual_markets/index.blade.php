@extends('layouts.app')

@section('title')
    Virtual markets
@endsection


@section('content')

@foreach($virtual_markets as $virtual_market)

        <a href="/virtual_markets/{{ $virtual_market->id }}/">
            <div class="vm-container col-3"><div class="vm-name">{{ $virtual_market->name }}</div> </div>
        </a>
        <div class="linked-stores"></div>
@endforeach

@endsection
