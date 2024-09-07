@extends('layouts.app')

@section('title')
    Edit Source
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Source</h5>

                <div class="container mt-4">
                    <form method="post" action="{{ route('sources.update', $source->id) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $source->name }}" type="text" class="form-control" name="name"
                                placeholder="Change name here" required>
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class=" mb-3 form-group">
                            <label for="datetime" class="form-label">Date and Time</label>
                            <div class="input-group date" id="datetimepicker">
                                <input value="{{ $source->time }}" type="datetime-local" class="form-control" name="time"
                                    id="datetime" required>
                                @if ($errors->has('time'))
                                    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Update Source
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </button>
                        <a href="{{ route('sources.index') }}" class="btn btn-outline-danger btn-sm">
                            Cancel
                            <i class="fa-sharp fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
