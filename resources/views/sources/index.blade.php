@extends('layouts.app')

@section('title')
    Sources List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sources</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your sources here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="row mb-2 text-start">
                    <div class="col-4">
                        <form action="{{ route('sources.index') }}" method="get">
                            <input type="search" class="form-control form-control-sm" placeholder="search" name="q">
                        </form>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('sources.index') }}" class="btn btn-outline-dark btn-sm">
                            Clear Search
                            <i class="fa-sharp fa-solid fa-magnifying-glass-minus"></i>
                        </a>
                    </div>
                    <div class="col-5 text-end">
                        <a href="{{ route('sources.create') }}" class="btn btn-outline-success btn-sm float-right">
                            Add source
                            <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                        </a>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">No</th>
                            <th scope="col" width="15%">Name</th>
                            <th scope="col" width="15%">Time</th>
                            <th scope="col" width="15%">Status</th>
                            <th scope="col" width="1%" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sources as $source)
                            <tr>
                                <th scope="row">{{ $source->id }}</th>
                                <td>{{ $source->name }}</td>
                                <td>{{ $source->time }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        {{-- <input class="form-check-input" type="checkbox" role="switch"
                                            id="toggleSwitch{{ $source->id }}" data-source-id="{{ $source->id }}"
                                            {{ $source->is_final ? 'checked' : '' }}> --}}
                                        <label class="form-check-label" for="toggleSwitch{{ $source->id }}">
                                            {{ $source->is_final ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div>

                                    {{-- <form action="{{ route('toggle.status', ['source' => $source->id]) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn-toggle-status">{{ $source->is_final ? 'Active' : 'Inactive' }}</button>
                                    </form>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="toggleSwitch{{ $source->id }}" data-source-id="{{ $source->id }}"
                                            {{ $source->is_final ? 'checked' : '' }}>
                                        <label class="form-check-label" for="toggleSwitch{{ $source->id }}">
                                            {{ $source->is_final ? 'Active' : 'Inactive' }}
                                        </label>
                                    </div> --}}

                                </td>
                                <td>
                                    {{-- <a href="{{ route('sources.show', $source->id) }}"
                                        class="btn btn-outline-warning btn-sm">
                                        <i class="fa-sharp fa-solid fa-eye"></i>
                                    </a> --}}
                                </td>
                                <td>
                                    <a href="{{ route('sources.edit', $source->id) }}" class="btn btn-outline-info btn-sm">
                                        <i class="fa-sharp fa-solid fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['sources.destroy', $source->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-outline-danger btn-sm',
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {!! $sources->links() !!}
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSwitches = document.querySelectorAll('.form-check-input');

            toggleSwitches.forEach(function(toggleSwitch) {
                toggleSwitch.addEventListener('change', function() {
                    const sourceID = toggleSwitch.getAttribute('data-source-id');
                    const isChecked = toggleSwitch.checked;

                    fetch(`/toggle-status/${sourceID}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                is_final: isChecked
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            // Refresh the page after the switch is toggled
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });

            // let debounceTimeout;

            // toggleSwitches.forEach(function(toggleSwitch) {
            //     toggleSwitch.addEventListener('change', function() {
            //         clearTimeout(debounceTimeout);

            //         debounceTimeout = setTimeout(() => {
            //             const sourceID = toggleSwitch.getAttribute('data-source-id');
            //             const isChecked = toggleSwitch.checked;

            //             fetch(`/toggle-status/${sourceID}`, {
            //                     method: 'POST',
            //                     headers: {
            //                         'Content-Type': 'application/json',
            //                         'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //                     },
            //                     body: JSON.stringify({
            //                         is_final: isChecked
            //                     })
            //                 })
            //                 .then(response => response.json())
            //                 .then(data => {
            //                     console.log(data);
            //                     // Refresh the page after the switch is toggled
            //                     location.reload();
            //                 })
            //                 .catch(error => {
            //                     console.error('Error:', error);
            //                 });
            //         }, 300); // Adjust the debounce delay as needed
            //     });
            // });
        });
    </script>
@endsection
