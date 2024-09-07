@extends('layouts.app')

@section('title')
    Create Currency Pairs
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new pair</h1>
        <div class="lead">
            Add new pair.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('pairs.store') }}">
                @csrf
                {{-- <div class="mb-3">
                    <label for="origin_code_currencies" class="form-label">Origin Code Currency</label>
                    <select name="origin_code_currencies">
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->code }}">
                                {{ $currency->code }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('origin_code_currencies'))
                        <span class="text-danger text-left">{{ $errors->first('origin_code_currencies') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="destination_code_currencies" class="form-label">Destination Code Currency</label>
                    <select name="destination_code_currencies">
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->code }}">
                                {{ $currency->code }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('destination_code_currencies'))
                        <span class="text-danger text-left">{{ $errors->first('destination_code_currencies') }}</span>
                    @endif
                </div> --}}

                <div class="input-group mb-3">
                    <label class="input-group-text" for="origin_code_currencies">Choose</label>
                    <select class="form-select" name="origin_code_currencies" required>
                        <option value="">Origin Code Currency</option>
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->code }}">
                                {{ $currency->code }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('origin_code_currencies'))
                        <span class="text-danger text-left">{{ $errors->first('origin_code_currencies') }}</span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="destination_code_currencies">Choose</label>
                    <select class="form-select" name="destination_code_currencies" required>
                        <option value="">Destination Code Currency</option>
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->code }}">
                                {{ $currency->code }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('destination_code_currencies'))
                        <span class="text-danger text-left">{{ $errors->first('destination_code_currencies') }}</span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="name_source">Choose</label>
                    <select class="form-select" name="name_source" required>
                        <option value="">Name Source</option>
                        @foreach ($sources as $source)
                            <option value="{{ $source->name }}">
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('name_source'))
                        <span class="text-danger text-left">{{ $errors->first('name_source') }}</span>
                    @endif
                </div>

                {{-- <div class="input-group mb-3">
                    <label class="input-group-text" for="name_source">Choose</label>
                    <select class="form-select" name="name_source" required>
                        <input type="datetime" name="" id="" value="">
                        @if ($errors->has('name_source'))
                            <span class="text-danger text-left">{{ $errors->first('name_source') }}</span>
                        @endif
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="name_source" class="form-label">Name Source</label>
                    <select name="name_source">
                        @foreach ($sources as $source)
                            <option value="{{ $source->name }}">
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('name_source'))
                        <span class="text-danger text-left">{{ $errors->first('name_source') }}</span>
                    @endif
                </div> --}}

                <div class="mb-3">
                    <label for="rate_buy" class="form-label">Rate Buy</label>
                    <input value="{{ old('rate_buy') }}" type="text" class="form-control" name="rate_buy"
                        placeholder="Rate Buy" required>
                    @if ($errors->has('rate_buy'))
                        <span class="text-danger text-left">{{ $errors->first('rate_buy') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="rate_sell" class="form-label">Rate Sell</label>
                    <input value="{{ old('rate_sell') }}" type="text" class="form-control" name="rate_sell"
                        placeholder="Rate Sell" required>
                    @if ($errors->has('rate_sell'))
                        <span class="text-danger text-left">{{ $errors->first('rate_sell') }}</span>
                    @endif
                </div>

                {{-- <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input value="{{ old('status') }}" type="text" class="form-control" name="status"
                        placeholder="Status" required>
                    @if ($errors->has('status'))
                        <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                    @endif
                </div> --}}

                <button type="submit" class="btn btn-primary">Save pair</button>
                <a href="{{ route('pairs.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
