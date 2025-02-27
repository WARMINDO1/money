@extends('layouts.app')

@section('title')
    Role list
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Roles</h5>
                <h6 class="card-subtitle mb-2 text-muted"> Manage your roles here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                <div class="mb-2 text-end">
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-sm float-right">
                        Add role
                        <i class="fa-sharp fa-solid fa-user-check"></i>
                    </a>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th width="1%">No</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th width="3%" colspan="3">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $perm)
                                    <span class="badge text-bg-info">{{ $perm->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('roles.show', $role->id) }}">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="{{ route('roles.edit', $role->id) }}">
                                    <i class="fa-sharp fa-solid fa-pencil"></i>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-outline-danger btn-sm',
                                ]) !!}
                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} --}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                </table>

                <div class="d-flex">
                    {!! $roles->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
