@extends ('layouts.main')

@section ('content')

<h2>New Person</h2>

<hr/>

<form method="post" action="/person">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{ old('name') }}" >
        @if ($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Birthday</label>
        <input type="date" class="form-control @if ($errors->has('birthday')) is-invalid @endif" id="birthday" name="birthday" value="{{ old('birthday') }}"  >
        @if ($errors->has('birthday'))
        <div class="invalid-feedback">{{ $errors->first('birthday') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-control form-select @if ($errors->has('gender')) is-invalid @endif" id="gender" name="gender">
            <option @if (! old('gender')) selected @endif>Select Gender</option>
            <option value="1" @if (old('gender') == 1) selected @endif>Male</option>
            <option value="2" @if (old('gender') == 2) selected @endif>Female</option>
        </select>
        @if ($errors->has('gender'))
        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection