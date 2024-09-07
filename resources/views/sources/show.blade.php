@extends('layouts.app')

@section('title')
    Show Source
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Source</h5>

                <div class="container mt-4">
                    <div>
                        Name: {{ $source->name }}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('sources.edit', $source->id) }}" class="btn btn-info">
                            <i class="fa-sharp fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('sources.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
