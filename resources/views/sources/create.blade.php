@extends('layouts.app')

@section('title')
    Create Source
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new source</h1>
        <div class="lead">
            Add new source.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('sources.store') }}">
                @csrf
                {{-- <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input value="{{ old('code') }}" type="text" class="form-control" name="code" placeholder="Code"
                        required>
                    @if ($errors->has('code'))
                        <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                    @endif
                </div> --}}

                <input type="hidden" name="input_from" value="source">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                        placeholder="Input name here" required>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class=" mb-3 form-group">
                    <label for="datetime" class="form-label">Date and Time</label>
                    <div class="input-group date" id="datetimepicker">
                        <input type="datetime-local" class="form-control" name="time" id="datetime" required>
                        @if ($errors->has('time'))
                            <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label for="is_final" class="form-label">Is Final</label>
                    <input value="{{ old('is_final') }}" type="checkbox" class="form-control" name="is_final"
                        placeholder="Is Final" required>
                    @if ($errors->has('is_final'))
                        <span class="text-danger text-left">{{ $errors->first('is_final') }}</span>
                    @endif
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="is_final" class="form-label">
                        Is Final
                    </label>
                    <input type="checkbox" name="is_final" />
                    @if ($errors->has('is_final'))
                        <span class="flex items-center text-sm text-red-600">{{ $errors->first('is_final') }}</span>
                    @endif
                </div> --}}

                <button type="submit" class="btn btn-outline-success btn-sm">
                    Save source
                    <i class="fa-sharp fa-solid fa-plus"></i>
                </button>
                <a href="{{ route('sources.index') }}" class="btn btn-outline-warning btn-sm">
                    Back
                    <i class="fa-sharp fa-solid fa-rotate-left"></i>
                </a>
            </form>
        </div>

    </div>
@endsection
