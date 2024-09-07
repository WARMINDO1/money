@extends('layouts.app')

@section('title')
    Show Pair
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Pair</h5>

                <div class="container mt-4">
                    <div>
                        Origin Code: {{ $pair->origin_code_currency }}
                    </div>
                    <div>
                        Destination Code: {{ $pair->destination_code_currency }}
                    </div>
                    <div>
                        Name Source: {{ $pair->name_source }}
                    </div>
                    <div>
                        Rate Buy: {{ $pair->rate_buy }}
                    </div>
                    <div>
                        Rate Sell: {{ $pair->rate_sell }}
                    </div>
                    <div>
                        Time: {{ $pair->time }}
                    </div>
                    <div>
                        Status: {{ $pair->status }}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('pairs.edit', $pair->id) }}" class="btn btn-info">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('pairs.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
