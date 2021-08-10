@extends('layouts.app')

@section('title')
    Products
@endsection


@section('content')

@foreach($virtual_markets as $virtual_market)
    @foreach($products as $product)

        <a href="/virtual_markets/{{ $virtual_market->id }}/products">
            <div class="vm-container col-3"><div class="vm-name">{{ $product->name }}</div> </div>
        </a>
        <div class="linked-stores"></div>
@endforeach
@endforeach

@endsection
