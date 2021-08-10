@extends('layouts.app')

@section('title')
    Virtual markets
@endsection


@section('content')
    @foreach($virtual_markets as $virtual_market)
        @foreach($categories as $category)

        <a href="/virtual_markets/{{ $virtual_market->id }}/categories/{{ $category->id }}">
            <div class="vm-container col-3"><div class="vm-name">{{ $category->name }}</div> </div>
        </a>
        <div class="linked-stores"></div>
@endforeach
@endforeach

@endsection
