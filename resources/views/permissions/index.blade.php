@extends('layouts.app')

@section('title')
    Permission List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Permissions</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your permissions here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="text-end">
                    <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary btn-sm float-right">
                        Add permissions
                        <i class="fa-sharp fa-solid fa-user-shield"></i>
                    </a>
                </div>

                <table class="tabble table-responsive table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="15%">Name</th>
                            <th scope="col">Guard</th>
                            <th scope="col" colspan="3" width="1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fa-sharp fa-solid fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['permissions.destroy', $permission->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-outline-danger btn-sm',
                                    ]) !!}
                                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} --}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
