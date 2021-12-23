@extends ('layouts.main')

@section ('content')

<h2>Addresses</h2>

<hr>

<div class="d-flex justify-content-end pb-3">
    <a href="/address/new/{{ request()->route('person_id') }}" class="btn btn-primary">New Address</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Address</th>
            <th scope="col">Post Code</th>
            <th scope="col">City Name</th>
            <th scope="col">Country Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($addresses as $address)

        <tr>
            <th scope="row">{{ $address->id }}</th>
            <td>{{ $address->address }}</td>
            <td>{{ $address->post_code }}</td>
            <td>{{ $address->city_name }}</td>
            <td>{{ $address->country_name }}</td>
            <td>
                <a href="/address/edit/{{ $address->id }}">Edit</a> | <a href="/address/remove/{{ $address->id }}">Remove</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection