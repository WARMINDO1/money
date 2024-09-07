@extends('layouts.app')

@section('title')
    Show Currency
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Currency</h5>

                <div class="container mt-4">
                    <div>
                        Code: {{ $currency->code }}
                    </div>
                    <div>
                        Name: {{ $currency->name }}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-info">
                            <i class="fa-sharp fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('currencies.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
