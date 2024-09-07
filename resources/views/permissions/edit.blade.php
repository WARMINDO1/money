@extends('layouts.app')

@section('title')
    Edit Permission
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Permission</h5>

                <div class="container mt-4">

                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $permission->name }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Update permission
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-danger btn-sm">
                            Cancel
                            <i class="fa-sharp fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
                        </a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
