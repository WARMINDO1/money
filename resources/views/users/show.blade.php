@extends('layouts.app')

@section('title')
    Show User
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Show user</h5>

                <div class="container mt-4">
                    <div>
                        Name: {{ $user->name }}
                    </div>
                    <div>
                        Username: {{ $user->username }}
                    </div>
                    <div>
                        Email: {{ $user->email }}
                    </div>
                    <div>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </div>
                    @role('Admin')
                        <div class="mt-4">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info btn-sm">
                                Edit user
                                <i class="fa-sharp fa-solid fa-user-pen"></i>
                            </a>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-dark btn-sm">
                                Back
                                <i class="fa-sharp fa-solid fa-rotate-left"></i>
                            </a>
                        </div>
                    @endrole
                </div>

            </div>

        </div>
    </div>
@endsection


{{-- @extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $user->username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if (!empty($user->getRoleNames()))
                    @foreach ($user->getRoleNames() as $v)
                        <span class="badge rounded-pill text-bg-primary">{{ $v }}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection --}}
