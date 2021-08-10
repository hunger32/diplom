@extends('layouts.app')

@section('title')
    Add store
@endsection

@section('content')
                <form method="POST" action="{{ route('virtual_markets.create') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Virtual market name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Create virtual market
                                </button>
                    </div>
                        </div>
                    </div>
                </form>
    @endsection
