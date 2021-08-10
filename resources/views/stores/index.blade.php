@extends('layouts.app')

@section('title')
    Attached stores
@endsection

{{--/virtual_markets/{{ $virtual_market->id }}--}}
@endsection

@section('content')

@foreach($stores as $store)

        <a href="/stores/{{ $store->id }}">
            <div class="vm-container col-3"><div class="vm-name">{{ $store->name }}</div> </div>
        </a>
        <div class="linked-stores"></div>
@endforeach

@endsection
