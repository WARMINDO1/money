@extends('layouts.app')

@section('title')
    Edit Currency
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Currency</h5>

                <div class="container mt-4">
                    <form method="post" action="{{ route('currencies.update', $currency->id) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input value="{{ $currency->code }}" type="text" class="form-control" name="code"
                                placeholder="Change code here" required>

                            @if ($errors->has('code'))
                                <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $currency->name }}" type="text" class="form-control" name="name"
                                placeholder="Change name here" required>
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Update Currency
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </button>
                        <a href="{{ route('currencies.index') }}" class="btn btn-outline-danger btn-sm">
                            Cancel
                            <i class="fa-sharp fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
