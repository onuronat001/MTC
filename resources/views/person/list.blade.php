@extends ('layouts.main')

@section ('content')

<h2>Peronal List</h2>

<hr>

<div class="d-flex justify-content-end pb-3">
    <a href="/person/new" class="btn btn-primary">New Personal</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
            <th scope="col">Addresses</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($persons as $person)
        
        <tr>
            <th scope="row">{{ $person->id }}</th>
            <td>{{ $person->name }}</td>
            <td>{{ \Carbon\Carbon::parse($person->birthday)->format('d/m/Y') }}</td>
            <td>@if ($person->gender == 1) Male @else Female @endif</td>
            <td><a href="/address/{{ $person->id }}">Addresses ({{ $person->address_count }})</a></td>
            <td>
                <a href="/person/edit/{{ $person->id }}">Edit</a> | <a href="/person/remove/{{ $person->id }}">Remove</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

<div class="d-flex justify-content-end">
    {!! $persons->links() !!}
</div>

@endsection