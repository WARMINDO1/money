@extends('layouts.app')

@section('title')
    Edit Pair
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Pair</h5>

                <div class="container mt-4">
                    <form method="post" action="{{ route('pairs.update', $pair->id) }}">
                        @method('patch')
                        @csrf

                        <div class="mb-3">
                            <label for="origin_code_currencies" class="form-label">Origin Code Currency</label>
                            <div class="input-group">
                                <label class="input-group-text" for="origin_code_currencies">
                                    <i class="fa-sharp fa-solid fa-money-bill"></i>
                                </label>
                                <select class="form-select" name="origin_code_currencies" required>
                                    {{-- <option value="">Origin Code Currency</option> --}}
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->code }}"
                                            {{ $currency->code == $originCode ? 'selected' : '' }}>
                                            {{ $currency->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('origin_code_currencies'))
                                    <span
                                        class="text-danger text-left">{{ $errors->first('origin_code_currencies') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="destination_code_currencies" class="form-label">Destination Code Currency</label>
                            <div class="input-group">
                                <label class="input-group-text" for="destination_code_currencies">
                                    <i class="fa-sharp fa-solid fa-money-bills"></i>
                                </label>
                                <select class="form-select" name="destination_code_currencies" required>
                                    {{-- <option value="">Destination Code Currency</option> --}}
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->code }}"
                                            {{ $currency->code == $destinationCode ? 'selected' : '' }}>
                                            {{ $currency->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('destination_code_currencies'))
                                    <span
                                        class="text-danger text-left">{{ $errors->first('destination_code_currencies') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name_source" class="form-label">Source</label>
                            <div class="input-group">
                                <label class="input-group-text" for="name_source">
                                    <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                                </label>
                                <select class="form-select" name="name_source" disabled>
                                    <option value="">Name Source</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->name }}"
                                            {{ $source->name == $sourceName ? 'selected' : '' }}>
                                            {{ $source->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('name_source'))
                                    <span class="text-danger text-left">{{ $errors->first('name_source') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="datetime" class="form-label">Date and Time</label>
                            <div class="input-group date" id="datetimepicker">
                                <input type="datetime-local" class="form-control" name="time" id="datetime"
                                    value="{{ $pair->time }}" readonly>
                                @if ($errors->has('time'))
                                    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="rate_buy" class="form-label">Rate Buy</label>
                            <input value="{{ $pair->rate_buy }}" type="text" class="form-control" name="rate_buy"
                                placeholder="Change rate buy here" required>
                            @if ($errors->has('rate_buy'))
                                <span class="text-danger text-left">{{ $errors->first('rate_buy') }}</span>
                            @endif
                        </div> --}}

                        <div class="mb-3">
                            <label for="rate" class="form-label">Buy and Sell</label>
                            <div class="input-group">
                                <label for="rate_buy" class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-money-bill-wave"></i>
                                </label>
                                <input value="{{ $pair->rate_buy }}" type="text" class="form-control" name="rate_buy"
                                    placeholder="Change rate buy here" required>
                                @if ($errors->has('rate_buy'))
                                    <span class="text-danger text-left">{{ $errors->first('rate_buy') }}</span>
                                @endif
                                {{-- <input type="text" class="form-control" placeholder="Change rate here" aria-label="buy"> --}}
                                <span class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-repeat"></i>
                                </span>
                                {{-- <input type="text" class="form-control" placeholder="Change rate here" aria-label="sell"> --}}
                                <input value="{{ $pair->rate_sell }}" type="text" class="form-control" name="rate_sell"
                                    placeholder="Change rate sell here" required>
                                @if ($errors->has('rate_sell'))
                                    <span class="text-danger text-left">{{ $errors->first('rate_sell') }}</span>
                                @endif
                                <label for="rate_sell" class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-money-bill-1-wave"></i>
                                </label>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="rate_sell" class="form-label">Rate Sell</label>
                            <input value="{{ $pair->rate_sell }}" type="text" class="form-control" name="rate_sell"
                                placeholder="Change rate sell here" required>
                            @if ($errors->has('rate_sell'))
                                <span class="text-danger text-left">{{ $errors->first('rate_sell') }}</span>
                            @endif
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input value="{{ old('status') }}" type="text" class="form-control" name="status"
                                placeholder="Status" required>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        </div> --}}

                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Update Pair
                            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </button>
                        <a href="{{ route('pairs.index') }}" class="btn btn-outline-danger btn-sm">
                            Cancel
                            <i class="fa-sharp fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
                            {{-- <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i> --}}
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
