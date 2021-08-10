@extends('layouts.app')

@section('title')
    Add store
@endsection

@section('content')
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                        <div class="col-md-8 market-fields__add">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        </div>

                        <label for="name" class="col-md-3 col-form-label text-md-right">Description</label>
                        <div class="col-md-8 market-fields__add">
                            <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                        </div>

                        <label for="name" class="col-md-3 col-form-label text-md-right">Category ID</label>
                        <div class="col-md-8 market-fields__add">
                            <input id="category_id" type="number" class="form-control" name="category_id" value="{{ old('category_id') }}">

                        </div>

                        <label for="name" class="col-md-3 col-form-label text-md-right">Price</label>
                        <div class="col-md-8 market-fields__add">
                            <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}">

                        </div>

                        <label for="name" class="col-md-3 col-form-label text-md-right">Weight</label>
                        <div class="col-md-8 market-fields__add">
                            <input id="weight" type="number" class="form-control" name="weight" value="{{ old('weight') }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-product">
                                    Add product
                                </button>
                    </div>
                        </div>
                    </div>
                </form>
    @endsection
