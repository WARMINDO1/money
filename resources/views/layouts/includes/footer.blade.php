<footer class="footer text-sm">
    <div>
        <a href="/">MoneyChangerXYZ</a>.
        Copyright &copy; {{ date('Y') }}
    </div>
    @auth
        <div class="ms-auto">Bootstrap Admin Template</div>
    @endauth
</footer>

{{-- <!-- Modal Add pair-->
<div class="modal fade" id="addSource" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addSources" aria-hidden="true">
    <form method="POST" action="{{ route('pairs.store') }}">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="bg-light modal-header">
                    <h5 class="modal-title" id="addSources">Add new pair</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="name_source">
                                <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                            </label>
                            <select class="form-select" name="name_source" required>
                                <option value="" disabled selected hidden>Name Source</option>
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

                        <div class=" mb-3 form-group">
                            <label for="datetime" class="form-label">Date and Time</label>
                            <div class="input-group date" id="datetimepicker">
                                <input type="datetime-local" class="form-control" name="time" id="datetime"
                                    required>
                                @if ($errors->has('time'))
                                    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-danger btn-sm">Clear
                        <i class="fa-sharp fa-solid fa-eraser"></i>
                    </button>
                    <button type="submit" class="btn btn-outline-success btn-sm">Add
                        <i class="fa-sharp fa-solid fa-plus"></i>
                    </button>
                </div>
    </form>
</div>

<div class="modal fade" id="addCurrency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addCurrencies" aria-hidden="true">
    <form method="POST" action="{{ route('pairs.store') }}">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="bg-light modal-header">
                    <h5 class="modal-title" id="addCurrencies">Add new currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="origin_code_currencies">
                                <i class="fa-sharp fa-solid fa-money-bill"></i>
                            </label>
                            <select class="form-select" name="origin_code_currencies" required>
                                <option value="" disabled selected hidden>Origin Code Currency
                                </option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->code }}">
                                        {{ $currency->code }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('origin_code_currencies'))
                                <span
                                    class="text-danger text-left">{{ $errors->first('origin_code_currencies') }}</span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="destination_code_currencies">
                                <i class="fa-sharp fa-solid fa-money-bills"></i>
                            </label>
                            <select class="form-select" name="destination_code_currencies" required>
                                <option value="" disabled selected hidden>Destination Code
                                    Currency
                                </option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->code }}">
                                        {{ $currency->code }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('destination_code_currencies'))
                                <span
                                    class="text-danger text-left">{{ $errors->first('destination_code_currencies') }}</span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="name_source">
                                <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                            </label>
                            <select class="form-select" name="name_source" required>
                                <option value="" disabled selected hidden>Name Source</option>
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

                        <div class=" mb-3 form-group">
                            <label for="datetime" class="form-label">Date and Time</label>
                            <div class="input-group date" id="datetimepicker">
                                <input type="datetime-local" class="form-control" name="time" id="datetime"
                                    required>
                                @if ($errors->has('time'))
                                    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="rate" class="form-label">Buy and Sell</label>
                            <div class="input-group">
                                <label for="rate_buy" class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-money-bill-wave"></i>
                                </label>
                                <input value="{{ old('rate_buy') }}" type="text" class="form-control"
                                    name="rate_buy" placeholder="Input rate buy here" required>
                                @if ($errors->has('rate_buy'))
                                    <span class="text-danger text-left">{{ $errors->first('rate_buy') }}</span>
                                @endif
                                <span class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-repeat"></i>
                                </span>
                                <input value="{{ old('rate_sell') }}" type="text" class="form-control"
                                    name="rate_sell" placeholder="Input rate sell here" required>
                                @if ($errors->has('rate_sell'))
                                    <span class="text-danger text-left">{{ $errors->first('rate_sell') }}</span>
                                @endif
                                <label for="rate_sell" class="input-group-text">
                                    <i class="fa-sharp fa-solid fa-money-bill-1-wave"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-danger btn-sm">Clear
                        <i class="fa-sharp fa-solid fa-eraser"></i>
                    </button>
                    <button type="submit" class="btn btn-outline-success btn-sm">Add
                        <i class="fa-sharp fa-solid fa-plus"></i>
                    </button>
                </div>
    </form>
</div> --}}
