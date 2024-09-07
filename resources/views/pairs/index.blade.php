@extends('layouts.app')


@section('title')
    Currency Pair List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body" id="source-table">

                {{-- <div class="position-fixed top-10 end-0" id="toast-container">
                </div> --}}
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1056;" id="toastr-container">
                    @include('layouts.includes.errors')
                    @include('layouts.includes.messages')
                </div>

                <h5 class="card-title">Currency Pairs</h5>

                <h6 class="card-subtitle mb-2 text-muted">Manage your pairs here.</h6>

                <div class="row mb-2">
                    <div class="container-fluid input-group row col-12">
                        <!-- filter -->
                        <div class="col-4">
                            <form action="{{ route('pairs.index') }}" method="get" class="w-15">
                                <div class="input-group">
                                    <a href="{{ route('pairs.index') }}" class="btn btn-outline-dark btn-sm">
                                        {{-- <i class="fa-sharp fa-solid fa-delete-left"></i> --}}
                                        Reset
                                        <i class="fa-solid fa-delete-left fa-flip-horizontal"></i>
                                    </a>
                                    <select name="q" class="form-select form-select-sm" required>
                                        <option value="" disabled selected hidden>Choose Source</option>
                                        @php
                                            $uniqueSources = $sources->pluck('name')->unique();
                                        @endphp
                                        @foreach ($uniqueSources as $source)
                                            <option value="{{ $source }}"
                                                {{ $source == $lastSource ? 'selected' : '' }}>
                                                {{ $source }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-primary btn-sm" type="submit">
                                        <i class="fa-solid fa-filter"></i>
                                        Filter
                                    </button>
                                </div>
                            </form>

                            {{-- <form action="{{ route('pairs.index') }}" method="get" class="w-15">
                            <div class="input-group">
                                <select name="q" class="form-select form-select-sm" required>
                                    <option value="" disabled selected hidden>Choose Time</option>
                                    @php
                                        $uniqueTime = $sources->pluck('time')->unique();
                                    @endphp
                                    @foreach ($uniqueTime as $time)
                                        <option value="{{ $time }}" {{ $time == $lastTime ? 'selected' : '' }}>
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-primary btn-sm" type="submit">
                                    <i class="fa-solid fa-filter"></i>
                                    Filter
                                </button>
                            </div>
                        </form> --}}
                        </div>
                        <!-- end filter -->

                        <div class="col-5"></div>


                        <div class="col-3 flex-md-nowrap text-end">
                            <div class="col-auto">
                                <button id="addPairButton" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addCurrency">
                                    Add pair
                                    <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
                                </button>
                            </div>
                            @role('Admin')
                                <div class="col-auto">
                                    <button id="addPairButton" class="btn btn-outline-primary btn-sm float-right"
                                        data-bs-target="#addSource" data-bs-toggle="modal">
                                        Add source
                                        <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                                    </button>
                                </div>
                            @endrole
                        </div>

                    </div>
                </div>

                <!-- bagian tampil data tabel-->
                <div class="container mb-3 ">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                {{-- <th scope="col" width="15%">No</th> --}}
                                <th scope="col" width="30%">Source</th>
                                <th scope="col" width="30%">Time</th>
                                @role('Supervisor')
                                    <th scope="col" width="15%">Status</th>
                                @endrole
                                @role('Admin')
                                    <th scope="col" width="10%"></th>
                                @endrole
                                <th scope="col" width="10%"></th>
                            </tr>
                            <tr rowspan="1"></tr>
                        </thead>
                        <tbody>
                            @foreach ($sources as $source)
                                <tr>
                                    {{-- <th scope="row">{{ $pair->id }}</th> --}}
                                    <td>{{ $source->name }}</td>
                                    <td>{{ $source->time }}</td>
                                    @role('Supervisor')
                                        <td>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="toggleSwitch{{ $source->id }}" data-source-id="{{ $source->id }}"
                                                    {{ $source->is_final ? 'checked' : '' }}>
                                                <label class="form-check-label" for="toggleSwitch{{ $source->id }}">
                                                    {{ $source->is_final ? 'Active' : 'Inactive' }}
                                                </label>
                                            </div>

                                        </td>
                                    @endrole
                                    @role('Admin')
                                        <td>
                                            {{-- <button id="addPairButton" class="btn btn-outline-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#addCurrency"
                                            data-source-name="{{ $source->name }}" data-source-time="{{ $source->time }}"
                                            data-source-status="{{ $source->is_final }}">
                                            Add pair
                                            <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
                                        </button> --}}
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['sources.destroy', $source->id],
                                                'style' => 'display:inline',
                                            ]) !!}
                                            {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-outline-danger btn-sm',
                                                'onclick' => "return confirm('Are you sure you want to delete this source?')",
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    @endrole
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm collapsed btn-detail"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $source->id }}"
                                            aria-expanded="false" aria-controls="collapse{{ $source->id }}"
                                            data-source-id="{{ $source->id }}" data-toggle-state="off"
                                            data-icon="fa-eye-slash">
                                            Detail
                                            <i id="icon-{{ $source->id }}" class="fa-sharp fa-solid fa-eye-slash "></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div id="collapse{{ $source->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table table-striped table-success">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th scope="col" width="1%">No</th> --}}
                                                            <th scope="col" width="10%">Origin Currency</th>
                                                            <th scope="col" width="13%">Destination Currency</th>
                                                            <th scope="col" width="7%">Source</th>
                                                            <th scope="col" width="7%">Rate Buy</th>
                                                            <th scope="col" width="7%">Rate Sell</th>
                                                            <th scope="col" width="10%">Time</th>
                                                            <th scope="col" width="5%">Status</th>
                                                            <th scope="col" width="1%" colspan="2">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pairs as $pair)
                                                            {{-- @if ($pair->name_source === $source->name && $pair->time === $source->time) --}}
                                                            @if ($pair->name_source === $source->name)
                                                                <tr>
                                                                    {{-- <th scope="row">{{ $pair->id }}</th> --}}
                                                                    <td>{{ $pair->origin_code_currency }}</td>
                                                                    <td>{{ $pair->destination_code_currency }}</td>
                                                                    <td>{{ $pair->name_source }}</td>
                                                                    <td>{{ $pair->rate_buy }}</td>
                                                                    <td>{{ $pair->rate_sell }}</td>
                                                                    <td>{{ $pair->time }}</td>
                                                                    {{-- <td>{{ $pair->status }}</td> --}}
                                                                    <td>{{ $pair->status ? 'Active' : 'Inactive' }}
                                                                    </td>
                                                                    <td>
                                                                        {{-- <a href="{{ route('pairs.edit', $pair->id) }}"
                                                                            class="btn btn-outline-info btn-sm">
                                                                            <i class="fa-sharp fa-solid fa-pencil"></i>
                                                                        </a> --}}
                                                                    </td>
                                                                    <td>
                                                                        {{-- {!! Form::open([
                                                                            'method' => 'DELETE',
                                                                            'route' => ['pairs.destroy', $pair->id],
                                                                            'style' => 'display:inline',
                                                                        ]) !!}
                                                                        {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                                                            'type' => 'submit',
                                                                            'class' => 'btn btn-outline-danger btn-sm',
                                                                        ]) !!}
                                                                        {!! Form::close() !!} --}}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- tutupannya -->

                <div class="d-flex">
                    {{ $sources->withQueryString()->links() }}
                </div>

            </div>
            <div class="modal fade" id="addSource" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="addSources" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('sources.store') }}">
                        @csrf
                        <div class="modal-content">
                            <div class="bg-light modal-header">
                                <h5 class="modal-title" id="addSources">Add new source</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="container mt-4">
                                    <input type="hidden" name="input_from" value="pair">

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="name_source">
                                            <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                                        </label>
                                        <input value="{{ old('name') }}" type="text" class="form-control"
                                            name="name" id="name" placeholder="Input name here" required>
                                    </div>

                                    <div class=" mb-3 form-group">
                                        <label for="datetime" class="form-label">Date and Time</label>
                                        <div class="input-group date" id="datetimepicker">
                                            <input type="datetime-local" class="form-control" name="time"
                                                id="datetime" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-outline-danger btn-sm" id="clear-source">Clear
                                    <i class="fa-sharp fa-solid fa-eraser"></i>
                                </button>
                                <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Are you sure you want to add new source?')">Add
                                    <i class="fa-sharp fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="addCurrency" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="addCurrencies" aria-hidden="true">

                <div class="modal-dialog modal-xl">

                    <form id="add-currency-form" method="POST" action="{{ route('pairs.store') }}">
                        @csrf
                        <div class="modal-content">
                            <div class="bg-light modal-header ">
                                <div class="pe-1 py-1">
                                    <button type="button" id="btn-show-input" class="btn btn-outline-warning btn-sm"
                                        data-toggle-button="off">
                                        <i id="icon" class="fa-sharp fa-solid fa-eye-slash"></i>
                                    </button>
                                </div>
                                <div class="input-group input-group-sm text-end w-50 d-none" id="header">
                                    <!-- Di dalam modal addCurrency -->
                                    <label class="input-group-text" for="source-select">
                                        Add new currency to :
                                    </label>
                                    <select class="form-select w-25" id="select_source">
                                        <option value="" disabled selected hidden>Choose Source</option>
                                        @foreach ($sous->sortBy('id') as $source)
                                            <option value="{{ $source->id }}" data-id-source="{{ $source->id }}">
                                                {{ $source->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-end" id="toastr-container">
                                    @if ($errors->has('origin_code_currencies'))
                                        <span class="text-danger text-left">
                                            {{ $errors->first('origin_code_currencies') }}
                                        </span>
                                    @endif
                                    @if ($errors->has('name_source'))
                                        <span class="text-danger text-left">
                                            {{ $errors->first('name_source') }}
                                        </span>
                                    @endif
                                </div>
                                {{-- <div class="position-fixed top-0 end-0" id="toast-container">
                                </div> --}}
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-7 col-lg-12 small"
                                        style="max-height: 400px; overflow: auto;" id="body1">
                                        <table class="table table-striped ">
                                            <thead class="table-warning align-middle sticky-top">
                                                <tr>
                                                    <th scope="col" rowspan="2">
                                                        <center>Origin Code</center>
                                                    </th>
                                                    <th scope="col" rowspan="2">
                                                        <center>Destination Code</center>
                                                    </th>
                                                    @foreach ($sous->sortBy('id') as $source)
                                                        @if ($loop->last)
                                                            <th scope="col" colspan="2" class="table-success">
                                                                <center>{{ $source->name }}</center>
                                                                <center class="small">{{ $source->time }}</center>
                                                            </th>
                                                        @else
                                                            <th scope="col" colspan="2">
                                                                <center>{{ $source->name }}</center>
                                                                <center class="small">{{ $source->time }}</center>
                                                            </th>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach ($sous->sortBy('id') as $source)
                                                        @if ($loop->last)
                                                            <th class="table-success">
                                                                <center>Buy</center>
                                                            </th>
                                                            <th class="table-success">
                                                                <center>Sell</center>
                                                            </th>
                                                        @else
                                                            <th>
                                                                <center>Buy</center>
                                                            </th>
                                                            <th>
                                                                <center>Sell</center>
                                                            </th>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody class="align-middle ">
                                                @php
                                                    $processedPairs = [];
                                                @endphp
                                                @foreach ($pairs as $pair)
                                                    @php
                                                        $originCode = $pair->origin_code_currency;
                                                        $destinationCode = $pair->destination_code_currency;
                                                        $pairKey = $originCode . '-' . $destinationCode;
                                                    @endphp
                                                    @if (!array_key_exists($pairKey, $processedPairs))
                                                        @php
                                                            $processedPairs[$pairKey] = true;
                                                        @endphp
                                                        <tr>
                                                            <td class="origin-code">
                                                                <center>{{ $pair->origin_code_currency }}</center>
                                                            </td>
                                                            <td class="border-start-1 destination-code">
                                                                <center>{{ $pair->destination_code_currency }}
                                                                </center>
                                                            </td>
                                                            @foreach ($sous->sortBy('id') as $source)
                                                                @if ($loop->last)
                                                                    @php
                                                                        $matchedPair = $pairs
                                                                            ->where('origin_code_currency', $originCode)
                                                                            ->where('destination_code_currency', $destinationCode)
                                                                            ->where('name_source', $source->name)
                                                                            ->first();
                                                                    @endphp
                                                                    <td class="table-success border-start-1 buy {{ $matchedPair && number_format(doubleval($matchedPair->rate_buy)) !== '-' ? 'editable' : 'empty-field' }}"
                                                                        data-pair-id="{{ $matchedPair ? $matchedPair->id : '' }}"
                                                                        contenteditable="{{ $matchedPair && number_format(doubleval($matchedPair->rate_buy)) !== '-' ? 'true' : 'false' }}"
                                                                        data-original-value=`{{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}`>
                                                                        <center>
                                                                            {{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}
                                                                        </center>
                                                                    </td>
                                                                    <td class="table-success border-start-1 sell {{ $matchedPair && $matchedPair->rate_sell !== '-' ? 'editable' : 'empty-field' }}"
                                                                        data-pair-id="{{ $matchedPair ? $matchedPair->id : '' }}"
                                                                        contenteditable="{{ $matchedPair && $matchedPair->rate_sell !== '-' ? 'true' : 'false' }}"
                                                                        data-original-value="{{ $matchedPair ? number_format(doubleval($matchedPair->rate_sell)) : '-' }}">
                                                                        <center>
                                                                            {{ $matchedPair ? number_format(doubleval($matchedPair->rate_sell)) : '-' }}
                                                                        </center>
                                                                    </td>
                                                                @else
                                                                    @php
                                                                        $matchedPair = $pairs
                                                                            ->where('origin_code_currency', $originCode)
                                                                            ->where('destination_code_currency', $destinationCode)
                                                                            ->where('name_source', $source->name)
                                                                            ->first();
                                                                    @endphp
                                                                    <td class="border-start-1 buy {{ $matchedPair && number_format(doubleval($matchedPair->rate_buy)) !== '-' ? 'editable' : 'empty-field' }}"
                                                                        data-pair-id="{{ $matchedPair ? $matchedPair->id : '' }}"
                                                                        contenteditable="{{ $matchedPair && number_format(doubleval($matchedPair->rate_buy)) !== '-' ? 'true' : 'false' }}"
                                                                        data-original-value=`{{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}`>
                                                                        <center>
                                                                            {{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}
                                                                        </center>
                                                                    </td>
                                                                    <td class="border-start-1 sell {{ $matchedPair && $matchedPair->rate_sell !== '-' ? 'editable' : 'empty-field' }}"
                                                                        data-pair-id="{{ $matchedPair ? $matchedPair->id : '' }}"
                                                                        contenteditable="{{ $matchedPair && $matchedPair->rate_sell !== '-' ? 'true' : 'false' }}"
                                                                        data-original-value="{{ $matchedPair ? number_format(doubleval($matchedPair->rate_sell)) : '-' }}">
                                                                        <center>
                                                                            {{ $matchedPair ? number_format(doubleval($matchedPair->rate_sell)) : '-' }}
                                                                        </center>
                                                                    </td>
                                                                @endif
                                                            @endforeach
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-none col-sm-12 col-md-5" id="body2">
                                        {{-- <form id="add-currency-form" method="POST"
                                        action="{{ route('pairs.store') }}">
                                        @csrf --}}

                                        <div class="container mt-4">

                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="origin_code_currencies">
                                                    <i class="fa-sharp fa-solid fa-money-bill"></i>
                                                </label>
                                                <select class="form-select" id="origin" name="origin_code_currencies"
                                                    required>
                                                    <option value="" disabled selected hidden>Origin Code
                                                        Currency
                                                    </option>
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->code }}">
                                                            {{ $currency->code }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- @foreach ($sous->sortBy('id') as $source) --}}
                                            <div class="d-none">
                                                <div class="mb-3">
                                                    <input value="" type="text" class="form-control"
                                                        name="name_source" id="source_name" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <input class="form-control" type="text" id="source_status"
                                                        name="status" value="" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <input value="" type="text" class="form-control"
                                                        name="time" id="source_time" readonly>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="destination_code_currencies">
                                                    <i class="fa-sharp fa-solid fa-money-bills"></i>
                                                </label>
                                                <select class="form-select" id="destination"
                                                    name="destination_code_currencies" required>
                                                    <option value="" disabled selected hidden>Destination
                                                        Code
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

                                            <div class="mb-3">
                                                <label for="rate" class="form-label">Buy and Sell</label>
                                                <div class="input-group">
                                                    <label for="rate_buy" class="input-group-text">
                                                        <i class="fa-sharp fa-solid fa-money-bill-wave"></i>
                                                    </label>
                                                    <input value="{{ old('rate_buy') }}" id="buy" type="text"
                                                        class="form-control" name="rate_buy"
                                                        placeholder="Input rate buy here" required>
                                                    <span class="input-group-text">
                                                        <i class="fa-sharp fa-solid fa-repeat"></i>
                                                    </span>
                                                    <input value="{{ old('rate_sell') }}" id="sell" type="text"
                                                        class="form-control" name="rate_sell"
                                                        placeholder="Input rate sell here" required>
                                                    <label for="rate_sell" class="input-group-text">
                                                        <i class="fa-sharp fa-solid fa-money-bill-1-wave"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- @endforeach --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none modal-footer" id="footer">
                                <!-- Tombol Clear -->
                                <button type="button" id="clear-button" class="btn btn-outline-danger btn-sm">
                                    Clear <i class="fa-sharp fa-solid fa-eraser"></i>
                                </button>
                                <button type="submit" class="btn btn-outline-success btn-sm"
                                    onclick="return confirm('Are you sure you want to add new pair?')">Add
                                    <i class="fa-sharp fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end modal-->

            </div>

            {{-- <div class="position-fixed bottom-0 end-0 p-3" id="toast-container">
            </div> --}}
        </div>
    </div>

    <script>
        function toaster() {
            const toastContainer = document.querySelector('#toast-container');

            // Membuat elemen toast
            const toast = document.createElement('div');
            toast.classList.add('toast');
            toast.classList.add('align-items-center');
            toast.classList.add('text-white');
            toast.classList.add('bg-success');
            toast.classList.add('border-0');
            toast.classList.add('show');
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            // Menambahkan konten toast
            toast.innerHTML =
                `<div class="d-flex">
                        <div class="toast-body">
                            Record berhasil ditambahkan!
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>`;

            // Menambahkan toast ke dalam toast-container
            toastContainer.appendChild(toast);

            // Menampilkan toast selama beberapa waktu
            const hideToast = () => {
                toast.style.transition = "opacity 0.5s ease-out";
                toast.style.opacity = 0;
                setTimeout(() => {
                    toast.remove(); // Menghapus elemen toast
                }, 500); // Waktu dalam milidetik (0.5 detik)
            };
            setTimeout(hideToast, 3000); // Waktu dalam milidetik (3 detik)
        }

        function bindModalEventListeners() {

            // For detail button
            const addPairButtons = document.querySelectorAll('.btn-detail');
            addPairButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const toggleState = button.getAttribute('data-toggle-state');
                    const icon = button.querySelector(
                        `#icon-${button.getAttribute('data-source-id')}`);

                    if (toggleState === 'off') {
                        button.classList.remove('btn-outline-warning');
                        button.classList.add('btn-warning');
                        button.setAttribute('data-toggle-state', 'on');
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye', 'fa-beat');
                    } else {
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-outline-warning');
                        button.setAttribute('data-toggle-state', 'off');
                        icon.classList.remove('fa-eye', 'fa-beat');
                        icon.classList.add('fa-eye-slash');
                    }
                });
            });

            // Choose modal
            const addCurrencyModal = document.querySelector('#addCurrency');
            const addSourceModal = document.querySelector('#addSource');

            // For showing input field in modal add pair
            const showAddInputField = addCurrencyModal.querySelector('#btn-show-input');
            const modalHeader = addCurrencyModal.querySelector('#header');
            const modalFooter = addCurrencyModal.querySelector('#footer');
            const modalBody1 = addCurrencyModal.querySelector('#body1');
            const modalBody2 = addCurrencyModal.querySelector('#body2');
            showAddInputField.addEventListener('click', function() {
                console.log('check-button');
                const toggleButton = showAddInputField.getAttribute('data-toggle-button');
                const icon = showAddInputField.querySelector('#icon');
                if (toggleButton === 'off') {
                    console.log('on');
                    modalHeader.classList.remove('d-none');
                    modalBody1.classList.remove('col-lg-12');
                    modalBody2.classList.remove('d-none');
                    modalFooter.classList.remove('d-none');
                    showAddInputField.classList.remove('btn-outline-warning');
                    showAddInputField.classList.add('btn-warning');
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye', 'fa-beat')
                    // showAddInputField.textContent = `<i class="fa-sharp fa-solid fa-eye"></i>`;
                    showAddInputField.setAttribute('data-toggle-button', 'on');
                } else {
                    console.log('off');
                    modalHeader.classList.add('d-none');
                    modalBody1.classList.add('col-lg-12');
                    modalBody2.classList.add('d-none');
                    modalFooter.classList.add('d-none');
                    showAddInputField.classList.remove('btn-warning');
                    showAddInputField.classList.add('btn-outline-warning');
                    icon.classList.remove('fa-eye', 'fa-beat');
                    icon.classList.add('fa-eye-slash')
                    showAddInputField.setAttribute('data-toggle-button', 'off');
                }
            });

            // Field inside modal
            const sourceNameInput = addCurrencyModal.querySelector('#source_name');
            const sourceTimeInput = addCurrencyModal.querySelector('#source_time');
            const sourceStatusInput = addCurrencyModal.querySelector('#source_status');
            const selectSource = addCurrencyModal.querySelector('#select_source');

            // Add new record
            const submitButton = addCurrencyModal.querySelector("#add-currency-form");
            submitButton.addEventListener("submit", async function(event) {
                event.preventDefault();

                // var formData = new FormData(this);
                // const formElement = document.getElementById("add-currency-form");
                // const formData = new FormData(formElement);
                const formData = new FormData(this);

                if (selectSource.value) {
                    formData.append("selected_source", selectSource.value);
                }

                try {
                    const response = await fetch("{{ route('pairs.store') }}", {
                        method: "POST",
                        body: formData
                    });

                    if (response.ok) {
                        const content = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(content, "text/html");

                        // Clear form inputs
                        document.querySelector("#origin").value = "";
                        document.querySelector("#destination").value = "";
                        document.querySelector("#buy").value = "";
                        document.querySelector("#sell").value = "";

                        // Reset source value
                        sourceNameInput.value = "";
                        sourceTimeInput.value = "";
                        sourceStatusInput.value = "";
                        selectSource.selectedIndex = 0;

                        const modalTable = doc.querySelector("#addCurrency");
                        const existingModalTable = document.querySelector("#addCurrency");
                        existingModalTable.innerHTML = modalTable.innerHTML;

                        const sourceTable = doc.querySelector("#source-table");
                        const existingSourceTable = document.querySelector("#source-table");
                        existingSourceTable.innerHTML = sourceTable.innerHTML;

                        bindModalEventListeners();


                        // document.querySelector("#add-currency-form").value = "";

                        console.log("Data added successfully");
                    } else {
                        console.error("Error:", response.status);
                    }
                } catch (error) {
                    console.error("An error occurred:", error);
                }
            });

            //Clear modal when pop up
            addCurrencyModal.addEventListener('show.bs.modal', function(event) {

                sourceNameInput.value = "";
                sourceTimeInput.value = "";
                sourceStatusInput.value = "";

                selectSource.selectedIndex = 0;

                console.log("tampil nih bang");

            });

            // Clear field inside modal
            document.querySelector('#clear-button').addEventListener('click', function() {
                addCurrencyModal.querySelector('#origin').value = '';
                addCurrencyModal.querySelector('#destination').value = '';
                addCurrencyModal.querySelector('#buy').value = '';
                addCurrencyModal.querySelector('#sell').value = '';

                sourceNameInput.value = "";
                sourceTimeInput.value = "";
                sourceStatusInput.value = "";
                selectSource.selectedIndex = 0;

                console.log("Clear atuh bang");
            });

            // Clear modal source when pop up
            addSourceModal.addEventListener('show.bs.modal', function() {
                // Field inside modal source
                addSourceModal.querySelector('#name').value = '';
                addSourceModal.querySelector('#datetime').value = '';

                console.log("jangan menyerah sekalipun kamu sudah lelah");
            })

            // Clear field inside modal source
            addSourceModal.querySelector('#clear-source').addEventListener('click', function() {
                // Field inside modal source
                addSourceModal.querySelector('#name').value = '';
                addSourceModal.querySelector('#datetime').value = '';

                console.log("hidup adalah waktu yang mengalir terus tanpa henti");
            })

            // Take name, status, and time from table Source
            selectSource.addEventListener('change', async function() {
                const selectedSourceOption = selectSource.options[selectSource.selectedIndex];
                const selectedSourceId = selectedSourceOption.getAttribute('data-id-source');

                // Lakukan fetch untuk mengambil data dari server
                fetch(`/get-source-data/${selectedSourceId}`)
                    .then(response => response.json())
                    .then(data => {
                        sourceNameInput.value = data.name;
                        sourceTimeInput.value = data.time;
                        // sourceStatusInput.checked = data.is_final === 1;
                        // Log the value of data.status
                        console.log('Data status:', data.status);

                        // Set checkbox status based on received data
                        sourceStatusInput.value = data.status;

                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });

            // Update buy rate
            const editableBuyCells = document.querySelectorAll('.buy[contenteditable="true"]');
            editableBuyCells.forEach(buyCell => {
                buyCell.addEventListener("keydown", async function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault(); // Prevent default behavior (line break)
                        const target = event.target;
                        const buyValue = target.textContent.trim();
                        const pairId = target.getAttribute("data-pair-id");

                        const response = await fetch(`/update-rate-buy/${pairId}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                buyValue
                            })
                        });

                        if (response.ok) {
                            const data = await response.json();
                            console.log("Rate buy updated:", data);

                            // Update the cell's original value
                            target.setAttribute("data-original-value", buyValue);
                            // Move focus out of the current cell after updating
                            target.blur();
                        } else {
                            // Handle error
                            console.error("Failed to update rate buy");

                            // Restore the original value in the cell
                            target.textContent = originalValue;
                        }
                    }
                });

                buyCell.addEventListener("blur", function() {
                    const originalValue = buyCell.getAttribute("data-original-value");
                    const formattedValue = new Intl.NumberFormat().format(originalValue);

                    // Reset cell content to original value
                    buyCell.textContent = formattedValue;
                    console.log("Outside")
                });

                buyCell.addEventListener("focus", function() {
                    const originalValue = buyCell.textContent.trim();
                    const numericValue = originalValue.replace(/,/g, ''); // Menghapus tanda koma
                    buyCell.textContent = numericValue; // Mengubah tampilan tanpa koma

                    // Store original value
                    buyCell.setAttribute("data-original-value", numericValue);
                    console.log("Inside")
                });
            });

            // Update sell rate
            const editableSellCells = document.querySelectorAll('.sell[contenteditable="true"]');
            editableSellCells.forEach(sellCell => {
                sellCell.addEventListener("keydown", async function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault(); // Prevent default behavior (line break)
                        const target = event.target;
                        const sellValue = target.textContent.trim();
                        const pairId = target.getAttribute("data-pair-id");

                        // Perform your AJAX request here for rate_sell using fetch
                        const response = await fetch(`/update-rate-sell/${pairId}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                sellValue
                            })
                        });

                        if (response.ok) {
                            const data = await response.json();
                            console.log("Rate sell updated:", data);

                            // Update the cell's original value
                            target.setAttribute("data-original-value", sellValue);
                            // Move focus out of the current cell after updating
                            target.blur();
                        } else {
                            // Handle error
                            console.error("Failed to update rate sell");

                            // Restore the original value in the cell
                            target.textContent = originalValue;
                        }
                    }
                });

                sellCell.addEventListener("blur", function() {
                    const originalValue = sellCell.getAttribute("data-original-value");
                    const formattedValue = new Intl.NumberFormat().format(originalValue);

                    // Reset cell content to original value
                    sellCell.textContent = formattedValue;
                    console.log("Outside")
                });

                sellCell.addEventListener("focus", function() {
                    const originalValue = sellCell.textContent.trim();
                    const numericValue = originalValue.replace(/,/g, ''); // Menghapus tanda koma
                    sellCell.textContent = numericValue; // Mengubah tampilan tanpa koma

                    // Store original value
                    sellCell.setAttribute("data-original-value", numericValue);
                    console.log("Inside")
                });
            });

            //Switch button for status
            const toggleSwitches = document.querySelectorAll('.form-check-input');
            toggleSwitches.forEach(function(toggleSwitch) {
                toggleSwitch.addEventListener('change', function() {
                    const sourceID = toggleSwitch.getAttribute('data-source-id');
                    const isChecked = toggleSwitch.checked;

                    fetch(`/toggle-status/${sourceID}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                is_final: isChecked
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            // Refresh the page after the switch is toggled
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });

            // Toastr
            const toast = document.getElementById('toastr-container');

            // Mengatur waktu timeout untuk menghilangkan elemen
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s ease-in-out';
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 5000);

        }

        document.addEventListener("DOMContentLoaded", function() {

            // For detail button
            const addPairButtons = document.querySelectorAll('.btn-detail');
            addPairButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const toggleState = button.getAttribute('data-toggle-state');
                    const icon = button.querySelector(
                        `#icon-${button.getAttribute('data-source-id')}`);

                    if (toggleState === 'off') {
                        button.classList.remove('btn-outline-warning');
                        button.classList.add('btn-warning');
                        button.setAttribute('data-toggle-state', 'on');
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye', 'fa-beat');
                    } else {
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-outline-warning');
                        button.setAttribute('data-toggle-state', 'off');
                        icon.classList.remove('fa-eye', 'fa-beat');
                        icon.classList.add('fa-eye-slash');
                    }
                });
            });


            // Choose modal
            const addCurrencyModal = document.querySelector('#addCurrency');
            const addSourceModal = document.querySelector('#addSource');

            // For showing input field in modal add pair
            const showAddInputField = addCurrencyModal.querySelector('#btn-show-input');
            const modalHeader = addCurrencyModal.querySelector('#header');
            const modalFooter = addCurrencyModal.querySelector('#footer');
            const modalBody1 = addCurrencyModal.querySelector('#body1');
            const modalBody2 = addCurrencyModal.querySelector('#body2');
            showAddInputField.addEventListener('click', function() {
                console.log('check-button');
                const toggleButton = showAddInputField.getAttribute('data-toggle-button');
                const icon = showAddInputField.querySelector('#icon');
                if (toggleButton === 'off') {
                    console.log('on');
                    modalHeader.classList.remove('d-none');
                    modalBody1.classList.remove('col-lg-12');
                    modalBody2.classList.remove('d-none');
                    modalFooter.classList.remove('d-none');
                    showAddInputField.classList.remove('btn-outline-warning');
                    showAddInputField.classList.add('btn-warning');
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye', 'fa-beat')
                    // showAddInputField.textContent = `<i class="fa-sharp fa-solid fa-eye"></i>`;
                    showAddInputField.setAttribute('data-toggle-button', 'on');
                } else {
                    console.log('off');
                    modalHeader.classList.add('d-none');
                    modalBody1.classList.add('col-lg-12');
                    modalBody2.classList.add('d-none');
                    modalFooter.classList.add('d-none');
                    showAddInputField.classList.remove('btn-warning');
                    showAddInputField.classList.add('btn-outline-warning');
                    icon.classList.remove('fa-eye', 'fa-beat');
                    icon.classList.add('fa-eye-slash')
                    showAddInputField.setAttribute('data-toggle-button', 'off');
                }
            });

            // Field inside modal for pull records from table source
            const sourceNameInput = addCurrencyModal.querySelector('#source_name');
            const sourceTimeInput = addCurrencyModal.querySelector('#source_time');
            const sourceStatusInput = addCurrencyModal.querySelector('#source_status');
            const selectSource = addCurrencyModal.querySelector('#select_source');

            // Add new record from currency pair modal
            const submitButton = addCurrencyModal.querySelector("#add-currency-form");
            submitButton.addEventListener("submit", async function(event) {
                event.preventDefault();

                // var formData = new FormData(this);
                // const formElement = document.getElementById("add-currency-form");
                // const formData = new FormData(formElement);
                const formData = new FormData(this);

                if (selectSource.value) {
                    formData.append("selected_source", selectSource.value);
                }

                try {
                    const response = await fetch("{{ route('pairs.store') }}", {
                        method: "POST",
                        body: formData
                    });

                    if (response.ok) {
                        const content = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(content, "text/html");

                        // Clear form inputs
                        document.querySelector("#origin").value = "";
                        document.querySelector("#destination").value = "";
                        document.querySelector("#buy").value = "";
                        document.querySelector("#sell").value = "";

                        // Reset source value
                        sourceNameInput.value = "";
                        sourceTimeInput.value = "";
                        sourceStatusInput.value = "";
                        selectSource.selectedIndex = 0;

                        // location.reload();
                        // // Open the modal again after successful submission
                        // $('#addCurrency').modal('show');


                        // // Update modal content
                        // const modalContent = doc.querySelector("#addCurrency .modal-content");
                        // document.querySelector("#addCurrency .modal-content")
                        //     .innerHTML = modalContent.innerHTML;

                        const modalTable = doc.querySelector("#addCurrency");
                        const existingModalTable = document.querySelector("#addCurrency");
                        existingModalTable.innerHTML = modalTable.innerHTML;

                        const sourceTable = doc.querySelector("#source-table");
                        const existingSourceTable = document.querySelector("#source-table");
                        existingSourceTable.innerHTML = sourceTable.innerHTML;

                        //         const toastContainer = document.querySelector('#toast-container');

                        //         // Membuat elemen toast
                        //         const toast = document.createElement('div');
                        //         toast.classList.add('toast');
                        //         toast.classList.add('align-items-center');
                        //         toast.classList.add('text-white');
                        //         toast.classList.add('bg-success');
                        //         toast.classList.add('border-0');
                        //         toast.classList.add('show');
                        //         toast.setAttribute('role', 'alert');
                        //         toast.setAttribute('aria-live', 'assertive');
                        //         toast.setAttribute('aria-atomic', 'true');

                        //         // Menambahkan konten toast
                        //         toast.innerHTML =
                        //             `<div class="d-flex">
                    //     <div class="toast-body">
                    //         Record berhasil ditambahkan!
                    //     </div>
                    //         <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    // </div>`;

                        //         // toast.innerHTML =
                        //         //     `<div class="d-flex">
                    // //     <div class="toast-header">
                    // //         <img src="..." class="rounded me-2" alt="...">
                    // //         <strong class="me-auto">Bootstrap</strong>
                    // //         <small class="text-body-secondary">11 mins ago</small>
                    // //         <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    // //     </div>
                    // //     <div class="toast-body">
                    // //         Hello, world! This is a toast message.
                    // //     </div>
                    // // </div>`;

                        //         // Menambahkan toast ke dalam toast-container
                        //         toastContainer.appendChild(toast);

                        //         // // Inisialisasi Toast
                        //         // const bootstrapToast = new bootstrap.Toast(toast);
                        //         // bootstrapToast.show();



                        //         // Mengatur toastr untuk menghilang setelah 5 detik (5000 ms)
                        //         setTimeout(() => {
                        //             toast.hide(); // Menyembunyikan toastr
                        //             toast.remove(); // Menghapus elemen toastr dari DOM
                        //             console.log('hilang dong');
                        //         }, 3000); // Waktu dalam milidetik (5 detik)

                        // toaster();
                        bindModalEventListeners();


                        // document.querySelector("#add-currency-form").value = "";

                        console.log("Data added successfully");
                    } else {
                        console.error("Error:", response.status);
                    }
                } catch (error) {
                    console.error("An error occurred:", error);
                }
            });

            // Clear modal currency pair when pop up
            addCurrencyModal.addEventListener('show.bs.modal', function(event) {

                sourceNameInput.value = "";
                sourceTimeInput.value = "";
                sourceStatusInput.value = "";

                selectSource.selectedIndex = 0;

                console.log("tampil nih bang");

            });

            // Clear field inside modal currency pair
            document.querySelector('#clear-button').addEventListener('click', function() {
                addCurrencyModal.querySelector('#origin').value = '';
                addCurrencyModal.querySelector('#destination').value = '';
                addCurrencyModal.querySelector('#buy').value = '';
                addCurrencyModal.querySelector('#sell').value = '';

                sourceNameInput.value = "";
                sourceTimeInput.value = "";
                sourceStatusInput.value = "";
                selectSource.selectedIndex = 0;

                console.log("Clear atuh bang");
            });

            // Clear modal source when pop up
            addSourceModal.addEventListener('show.bs.modal', function() {
                // Field inside modal source
                addSourceModal.querySelector('#name').value = '';
                addSourceModal.querySelector('#datetime').value = '';

                console.log("jangan menyerah sekalipun kamu sudah lelah");
            })

            // Clear field inside modal source
            addSourceModal.querySelector('#clear-source').addEventListener('click', function() {
                // Field inside modal source
                addSourceModal.querySelector('#name').value = '';
                addSourceModal.querySelector('#datetime').value = '';

                console.log("hidup adalah waktu yang mengalir terus tanpa henti");
            })

            // Take name, status, and time from table Source
            selectSource.addEventListener('change', async function() {
                const selectedSourceOption = selectSource.options[selectSource.selectedIndex];
                const selectedSourceId = selectedSourceOption.getAttribute('data-id-source');

                // Lakukan fetch untuk mengambil data dari server
                fetch(`/get-source-data/${selectedSourceId}`)
                    .then(response => response.json())
                    .then(data => {
                        sourceNameInput.value = data.name;
                        sourceTimeInput.value = data.time;
                        // sourceStatusInput.checked = data.is_final === 1;
                        // Log the value of data.status
                        console.log('Data status:', data.status);

                        // Set checkbox status based on received data
                        sourceStatusInput.value = data.status;

                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            });

            // Update buy rate
            const editableBuyCells = document.querySelectorAll('.buy[contenteditable="true"]');
            editableBuyCells.forEach(buyCell => {
                buyCell.addEventListener("keydown", async function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault(); // Prevent default behavior (line break)
                        const target = event.target;
                        const buyValue = target.textContent.trim();
                        const pairId = target.getAttribute("data-pair-id");

                        const response = await fetch(`/update-rate-buy/${pairId}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                buyValue
                            })
                        });

                        if (response.ok) {
                            const data = await response.json();
                            console.log("Rate buy updated:", data);

                            // Update the cell's original value
                            target.setAttribute("data-original-value", buyValue);
                            // Move focus out of the current cell after updating
                            target.blur();
                        } else {
                            // Handle error
                            console.error("Failed to update rate buy");

                            // Restore the original value in the cell
                            target.textContent = originalValue;
                        }
                    }
                });

                buyCell.addEventListener("blur", function() {
                    const originalValue = buyCell.getAttribute("data-original-value");
                    const formattedValue = new Intl.NumberFormat().format(originalValue);

                    // Reset cell content to original value
                    buyCell.textContent = formattedValue;
                    console.log("Outside")
                });

                buyCell.addEventListener("focus", function() {
                    const originalValue = buyCell.textContent.trim();
                    const numericValue = originalValue.replace(/,/g, ''); // Menghapus tanda koma
                    buyCell.textContent = numericValue; // Mengubah tampilan tanpa koma

                    // Store original value
                    buyCell.setAttribute("data-original-value", numericValue);
                    console.log("Inside")
                });
            });

            // Update sell rate
            const editableSellCells = document.querySelectorAll('.sell[contenteditable="true"]');
            editableSellCells.forEach(sellCell => {
                sellCell.addEventListener("keydown", async function(event) {
                    if (event.key === "Enter") {
                        event.preventDefault(); // Prevent default behavior (line break)
                        const target = event.target;
                        const sellValue = target.textContent.trim();
                        const pairId = target.getAttribute("data-pair-id");

                        // Perform your AJAX request here for rate_sell using fetch
                        const response = await fetch(`/update-rate-sell/${pairId}`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                sellValue
                            })
                        });

                        if (response.ok) {
                            const data = await response.json();
                            console.log("Rate sell updated:", data);

                            // Update the cell's original value
                            target.setAttribute("data-original-value", sellValue);
                            // Move focus out of the current cell after updating
                            target.blur();
                        } else {
                            // Handle error
                            console.error("Failed to update rate sell");

                            // Restore the original value in the cell
                            target.textContent = originalValue;
                        }
                    }
                });

                sellCell.addEventListener("blur", function() {
                    const originalValue = sellCell.getAttribute("data-original-value");
                    const formattedValue = new Intl.NumberFormat().format(originalValue);

                    // Reset cell content to original value
                    sellCell.textContent = formattedValue;
                    console.log("Outside")
                });

                sellCell.addEventListener("focus", function() {
                    const originalValue = sellCell.textContent.trim();
                    const numericValue = originalValue.replace(/,/g, ''); // Menghapus tanda koma
                    sellCell.textContent = numericValue; // Mengubah tampilan tanpa koma

                    // Store original value
                    sellCell.setAttribute("data-original-value", numericValue);
                    console.log("Inside")
                });
            });

            //Switch button for status
            const toggleSwitches = document.querySelectorAll('.form-check-input');
            // toggleSwitches.forEach(function(toggleSwitch) {
            //     toggleSwitch.addEventListener('change', function() {
            //         const sourceID = toggleSwitch.getAttribute('data-source-id');
            //         const isChecked = toggleSwitch.checked;

            //         // Matikan semua tombol switch yang lain
            //         toggleSwitches.forEach(function(otherSwitchElement) {
            //             if (otherSwitchElement !== toggleSwitch) {
            //                 otherSwitchElement.checked = false;
            //             }
            //         });

            //         fetch(`/toggle-status/${sourceID}`, {
            //                 method: 'POST',
            //                 headers: {
            //                     'Content-Type': 'application/json',
            //                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //                 },
            //                 body: JSON.stringify({
            //                     is_final: isChecked
            //                 })
            //             })
            //             .then(response => response.json())
            //             .then(data => {
            //                 console.log(data);
            //                 // Refresh the page after the switch is toggled
            //                 location.reload();
            //             })
            //             .catch(error => {
            //                 console.error('Error:', error);
            //             });
            //     });
            // });

            toggleSwitches.forEach(function(toggleSwitch) {
                toggleSwitch.addEventListener('change', function() {
                    const sourceID = toggleSwitch.getAttribute('data-source-id');
                    const isChecked = toggleSwitch.checked;

                    // Matikan semua tombol switch yang lain
                    toggleSwitches.forEach(function(otherSwitchElement) {
                        if (otherSwitchElement !== toggleSwitch) {
                            otherSwitchElement.checked = false;
                        }
                    });

                    // Kirim permintaan ke endpoint Laravel
                    fetch(`/toggle-status/${sourceID}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF jika digunakan
                            },
                            body: JSON.stringify({
                                sourceID: sourceID,
                                isChecked: isChecked,
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            // Refresh halaman atau lakukan tindakan lain yang diperlukan
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });


            // // Ambil status tombol switch saat halaman dimuat
            // const toggleSwitches = document.querySelectorAll('.form-check-input');
            // toggleSwitches.forEach(function(toggleSwitch) {
            //     const sourceID = toggleSwitch.getAttribute('data-source-id');

            //     // Mengambil status dari server saat halaman dimuat
            //     fetch(`/get-status/${sourceID}`)
            //         .then(response => response.json())
            //         .then(data => {
            //             toggleSwitch.checked = data.is_final;
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //         });

            //     toggleSwitch.addEventListener('change', function() {
            //         const isChecked = toggleSwitch.checked;

            //         // Matikan semua tombol switch yang lain
            //         toggleSwitches.forEach(function(otherSwitchElement) {
            //             if (otherSwitchElement !== toggleSwitch) {
            //                 otherSwitchElement.checked = false;
            //             }
            //         });

            //         // Kirim status ke server
            //         fetch(`/toggle-status/${sourceID}`, {
            //                 method: 'POST',
            //                 headers: {
            //                     'Content-Type': 'application/json',
            //                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //                 },
            //                 body: JSON.stringify({
            //                     is_final: isChecked
            //                 })
            //             })
            //             .then(response => response.json())
            //             .then(data => {
            //                 console.log(data);
            //                 // Refresh the page after the switch is toggled
            //                 location.reload();
            //             })
            //             .catch(error => {
            //                 console.error('Error:', error);
            //             });
            //     });
            // });



            // Toastr
            const toast = document.getElementById('toastr-container');

            // Mengatur waktu timeout untuk menghilangkan elemen
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s ease-in-out';
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 5000);

        });
    </script>
@endsection
