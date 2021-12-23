@extends ('layouts.main')

@section ('content')

<h2>New Address</h2>

<hr/>

<form method="post" action="/address">
    @csrf
    <input type="hidden" name="person_id" value="{{ request()->route('person_id') }}" >
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control @if ($errors->has('address')) is-invalid @endif" id="address" name="address" value="{{ old('address') }}" >
        @if ($errors->has('address'))
        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="post_code" class="form-label">Post Code</label>
        <input type="text" class="form-control @if ($errors->has('post_code')) is-invalid @endif" id="post_code" name="post_code" value="{{ old('post_code') }}"  >
        @if ($errors->has('post_code'))
        <div class="invalid-feedback">{{ $errors->first('post_code') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="city_name" class="form-label">City Name</label>
        <input type="text" class="form-control @if ($errors->has('city_name')) is-invalid @endif" id="city_name" name="city_name" value="{{ old('city_name') }}"  >
        @if ($errors->has('city_name'))
        <div class="invalid-feedback">{{ $errors->first('city_name') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="country_name" class="form-label">Country Name</label>
        <input type="text" class="form-control @if ($errors->has('country_name')) is-invalid @endif" id="country_name" name="country_name" value="{{ old('country_name') }}"  >
        @if ($errors->has('country_name'))
        <div class="invalid-feedback">{{ $errors->first('country_name') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection