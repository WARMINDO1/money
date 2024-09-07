@extends('layouts.app')

@section('title')
    Create Currency
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new currency</h1>
        <div class="lead">
            Add new currency.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('currencies.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input value="{{ old('code') }}" type="text" class="form-control" name="code"
                        placeholder="Input code here" required>
                    @if ($errors->has('code'))
                        <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                        placeholder="Input name here" required>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-success btn-sm">
                    Save currency
                    <i class="fa-sharp fa-solid fa-plus"></i>
                </button>
                <a href="{{ route('currencies.index') }}" class="btn btn-outline-warning btn-sm">
                    Back
                    <i class="fa-sharp fa-solid fa-rotate-left"></i>
                </a>
            </form>
        </div>

    </div>
@endsection
