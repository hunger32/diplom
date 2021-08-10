@extends('layouts.app')

@section('title')
    Add store
@endsection

@section('content')
                <form method="POST" action="{{ route('stores.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Store social id</label>

                        <div class="col-md-6">
                            <input id="store_social_id" type="number" class="form-control" name="name"  autofocus>
{{--                            value="{{ old('store_social_id') }}" required autocomplete="name"--}}
{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Attach store
                                </button>
                    </div>
                        </div>
                    </div>
                </form>
    @endsection
