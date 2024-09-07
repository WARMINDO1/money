@extends('layouts.app')

@section('title')
    Create Permission
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Permission</h5>

                <div class="container mt-4">

                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm">
                            Save permission
                            <i class="fa-sharp fa-solid fa-plus"></i>
                        </button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-warning btn-sm">
                            Back
                            <i class="fa-sharp fa-solid fa-rotate-left"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
