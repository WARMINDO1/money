@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- <div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">89.9%</div>
                <div>Widget title</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">12.124</div>
                <div>Widget title</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">$98.111,00</div>
                <div>Widget title</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">2 TB</div>
                <div>Widget title</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->

<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
            <div class="card-body">
                <div class="fs-4 fw-semibold">89.9%</div>
                <div>Widget title</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-warning">
            <div class="card-body">
                <div class="fs-4 fw-semibold">12.124</div>
                <div>Widget title</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-danger">
            <div class="card-body">
                <div class="fs-4 fw-semibold">$98.111,00</div>
                <div>Widget title</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-info">
            <div class="card-body">
                <div class="fs-4 fw-semibold">2 TB</div>
                <div>Widget title</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Widget helper text</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->

<div class="row">
    <div class="col-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary text-white p-3 me-3">
                    <svg class="icon icon-xl">
                        <use xlink:href="/fonts/free.svg#cil-settings"></use>
                    </svg>
                </div>
                <div>
                    <div class="fs-6 fw-semibold text-primary">$1.999,50</div>
                    <div class="text-medium-emphasis text-uppercase fw-semibold small">Widget title</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center"
                    href="#"><span class="small fw-semibold">View More</span>
                    <svg class="icon">
                        <use xlink:href="/fonts/free.svg#cil-chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-info text-white p-3 me-3">
                    <svg class="icon icon-xl">
                        <use xlink:href="/fonts/free.svg#cil-laptop"></use>
                    </svg>
                </div>
                <div>
                    <div class="fs-6 fw-semibold text-info">$1.999,50</div>
                    <div class="text-medium-emphasis text-uppercase fw-semibold small">Widget title</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center"
                    href="#"><span class="small fw-semibold">View More</span>
                    <svg class="icon">
                        <use xlink:href="/fonts/free.svg#cil-chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-warning text-white p-3 me-3">
                    <svg class="icon icon-xl">
                        <use xlink:href="/fonts/free.svg#cil-moon"></use>
                    </svg>
                </div>
                <div>
                    <div class="fs-6 fw-semibold text-warning">$1.999,50</div>
                    <div class="text-medium-emphasis text-uppercase fw-semibold small">Widget title</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center"
                    href="#"><span class="small fw-semibold">View More</span>
                    <svg class="icon">
                        <use xlink:href="/fonts/free.svg#cil-chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card mb-4">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-danger text-white p-3 me-3">
                    <svg class="icon icon-xl">
                        <use xlink:href="/fonts/free.svg#cil-bell"></use>
                    </svg>
                </div>
                <div>
                    <div class="fs-6 fw-semibold text-danger">$1.999,50</div>
                    <div class="text-medium-emphasis text-uppercase fw-semibold small">Widget title</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-medium-emphasis d-flex justify-content-between align-items-center"
                    href="#"><span class="small fw-semibold">View More</span>
                    <svg class="icon">
                        <use xlink:href="/fonts/free.svg#cil-chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row--> --}}


    {{-- <div class="card">
        <div class="card-body container">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" rowspan="2">
                            <center>Currency</center>
                        </th>
                        @foreach ($sources as $source)
                            <th scope="col" colspan="2">
                                <center>{{ $source->name }}</center>
                                <center>{{ $source->time }}</center>
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($sources as $source)
                            <th scope="col">
                                <center>Buy</center>
                            </th>
                            <th scope="col">
                                <center>Sell</center>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                        @if ($pairs->where('origin_code_currency', $currency->code)->count() > 0)
                            <tr>
                                <td>
                                    <center>{{ $currency->code }}</center>
                                </td>
                                @foreach ($sources as $source)
                                    @php
                                        $pair = $pairs
                                            ->where('origin_code_currency', $currency->code)
                                            ->where('name_source', $source->name)
                                            ->where('time', $source->time)
                                            ->first();
                                    @endphp
                                    <td>
                                        <center>{{ $pair ? $pair->rate_buy : '-' }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $pair ? $pair->rate_sell : '-' }}</center>
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}


    {{-- <div class="card">
        <div class="card-body container">
            <table class="table table-striped">
                <thead class="table-warning align-middle">
                    <tr>
                        <th scope="col" rowspan="2">
                            <center>Origin Code</center>
                        </th>
                        <th scope="col" rowspan="2">
                            <center>Destination Code</center>
                        </th>
                        @foreach ($sources as $source)
                            <th scope="col" colspan="2">
                                <center>{{ $source->name }}</center>
                                <center>{{ $source->time }}</center>
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($sources as $source)
                            <th scope="col">
                                <center>Buy</center>
                            </th>
                            <th scope="col">
                                <center>Sell</center>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pairs as $pair)
                        <tr>
                            <td>
                                <center>{{ $pair->origin_code_currency }}</center>
                            </td>
                            <td class="border-start-1">
                                <center>{{ $pair->destination_code_currency }}</center>
                            </td>
                            @foreach ($sources as $source)
                                @php
                                    $matchedPair = $pairs
                                        ->where('origin_code_currency', $pair->origin_code_currency)
                                        ->where('destination_code_currency', $pair->destination_code_currency)
                                        ->where('name_source', $source->name)
                                        ->where('time', $source->time)
                                        ->first();
                                @endphp
                                <td class="border-start-1">
                                    <center>{{ $matchedPair ? $matchedPair->rate_buy : '-' }}</center>
                                </td>
                                <td class="border-start-1">
                                    <center>{{ $matchedPair ? $matchedPair->rate_sell : '-' }}</center>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- <div class="card">
        <div class="card-body container">
            <table class="table table-striped">
                <thead class="table-warning align-middle">
                    <tr>
                        <th scope="col" rowspan="2">
                            <center>Origin Code</center>
                        </th>
                        <th scope="col" rowspan="2">
                            <center>Destination Code</center>
                        </th>
                        @foreach ($activeSources as $activeSource)
                            <th scope="col" colspan="2">
                                <center>{{ $activeSource->name }}</center>
                                <center>{{ $activeSource->time }}</center>
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($activeSources as $activeSource)
                            <th scope="col">
                                <center>Buy</center>
                            </th>
                            <th scope="col">
                                <center>Sell</center>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pairs as $pair)
                        <tr>
                            <td>
                                <center>{{ $pair->origin_code_currency }}</center>
                            </td>
                            <td class="border-start-1">
                                <center>{{ $pair->destination_code_currency }}</center>
                            </td>
                            @foreach ($activeSources as $activeSource)
                                @php
                                    $matchedPair = $pairs
                                        ->where('origin_code_currency', $pair->origin_code_currency)
                                        ->where('destination_code_currency', $pair->destination_code_currency)
                                        ->where('name_source', $activeSource->name)
                                        ->where('time', $activeSource->time)
                                        ->first();
                                @endphp
                                <td class="border-start-1">
                                    <center>{{ $matchedPair ? $matchedPair->rate_buy : '-' }}</center>
                                </td>
                                <td class="border-start-1">
                                    <center>{{ $matchedPair ? $matchedPair->rate_sell : '-' }}</center>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- <div class="card">
        <div class="card-body container">
            <h3>MoneyChangerXyz</h3>
            <!-- Form HTML -->
            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="source-select">
                        <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                    </label>
                    <select class="form-select w-25" id="select_source">
                        <option value="" disabled selected hidden>Choose Source</option>
                        @foreach ($sources->sortBy('id') as $source)
                            <option value="{{ $source->id }}" data-id-source="{{ $source->id }}">
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="origin_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bill"></i>
                    </label>
                    <select class="form-select" id="origin" name="origin_code_currencies" required>
                        <option value="" disabled selected hidden>Origin Code Currency</option>
                    </select>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-repeat"></i>
                    </span>
                    <select class="form-select" id="destination" name="destination_code_currencies" required>
                        <option value="" disabled selected hidden>Destination Code Currency</option>
                    </select>
                    <label class="input-group-text" for="destination_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bills"></i>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="buy_rate">
                        <i class="fa-sharp fa-solid fa-shopping-cart"></i>
                    </label>
                    <input type="text" class="form-control" id="buy_rate" name="buy_rate" readonly>
                </div>
            </div>



            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="source-select">
                        <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                    </label>
                    <select class="form-select w-25" id="select_source">
                        <option value="" disabled selected hidden>Choose Source</option>
                        @foreach ($sources->sortBy('id') as $source)
                            <option value="{{ $source->id }}" data-id-source="{{ $source->id }}">
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="origin_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bill"></i>
                    </label>
                    <select class="form-select" id="origin" name="origin_code_currencies" required>
                        <option value="" disabled selected hidden>Origin Code Currency</option>
                    </select>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-equals"></i>
                    </span>
                    <select class="form-select" id="destination" name="destination_code_currencies" required>
                        <option value="" disabled selected hidden>Destination Code Currency</option>
                    </select>
                    <label class="input-group-text" for="destination_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bills"></i>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="buy_rate">
                        <i class="fa-sharp fa-solid fa-shopping-cart"></i>
                        Buy
                    </label>
                    <input type="text" class="form-control" id="buy_rate" name="buy_rate" readonly>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-repeat"></i>
                    </span>
                    <input type="text" class="form-control" id="sell_rate" name="sell_rate" readonly>
                    <label class="input-group-text" for="sell_rate">
                        Sell
                        <i class="fa-sharp fa-solid fa-shopping-cart"></i>
                    </label>
                </div>
            </div>

        </div>
    </div> --}}

    <div class="card">
        <div class="card-body container">
            <h3>MoneyChangerXyz</h3>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="source-select">
                        <i class="fa-sharp fa-solid fa-money-bill-trend-up"></i>
                    </label>
                    <select class="form-select w-25" id="select_source">
                        <option value="" disabled selected hidden>Choose Source</option>
                        @foreach ($activeSources->sortBy('id') as $source)
                            <option value="{{ $source->id }}" data-id-source="{{ $source->id }}">
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="origin_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bill"></i>
                    </label>
                    <select class="form-select" id="origin" name="origin_code_currencies" required>
                        <option value="" disabled selected hidden>Origin Code Currency</option>
                    </select>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-equals"></i>
                    </span>
                    <select class="form-select" id="destination" name="destination_code_currencies" required>
                        <option value="" disabled selected hidden>Destination Code Currency</option>
                    </select>
                    <label class="input-group-text" for="destination_code_currencies">
                        <i class="fa-sharp fa-solid fa-money-bills"></i>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="buy_rate">
                        Buy
                    </label>
                    <input type="text" class="form-control" id="buy_rate" name="buy_rate" readonly>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-repeat"></i>
                    </span>
                    <input type="text" class="form-control" id="sell_rate" name="sell_rate" readonly>
                    <label class="input-group-text" for="sell_rate">
                        Sell
                    </label>
                </div>
            </div>

            <!-- Calculator -->
            <h6>Calculator</h6>
            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="amount">
                        Amount
                    </label>
                    <input type="text" class="form-control" id="amount" name="amount">
                    <button class="btn btn-primary" id="calculate">Calculate</button>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="resultBuy">
                        Result Buy
                    </label>
                    <input type="text" class="form-control" id="resultBuy" name="resultBuy" readonly>
                    <span class="input-group-text">
                        <i class="fa-sharp fa-solid fa-repeat"></i>
                    </span>
                    <input type="text" class="form-control" id="resultSell" name="resultSell" readonly>
                    <label class="input-group-text" for="resultSell">
                        Result Sell
                    </label>
                </div>
            </div>
            <!-- end Calculator -->
        </div>
    </div>
    </div>
    <!-- Tab panes -->

    


        <!-- JavaScript -->

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                // Ketika source yang berbeda dipilih
                $('#select_source').change(function() {
                    var selectedSourceId = $(this).val();

                    // Menghapus semua opsi yang ada
                    $('#origin').empty();
                    $('#destination').empty();

                    // Mengambil data origin dan destination berdasarkan source yang dipilih
                    $.ajax({
                        url: '/getOriginAndDestination/' + selectedSourceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Mengisi opsi origin
                            $.each(data.origins, function(key, value) {
                                $('#origin').append('<option value="' + value + '">' +
                                    value + '</option>');
                            });

                            // Mengisi opsi destination
                            $.each(data.destinations, function(key, value) {
                                $('#destination').append('<option value="' + value + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                });

                // Ketika origin dan destination dipilih
                $('#origin, #destination').change(function() {
                    var originCurrency = $('#origin').val();
                    var destinationCurrency = $('#destination').val();
                    var selectedSourceId = $('#select_source').val();

                    // Mengambil buy rate menggunakan AJAX
                    $.ajax({
                        url: '/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' +
                            destinationCurrency,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Menampilkan buy rate
                            $('#buy_rate').val(data.buy_rate);
                            $('#sell_rate').val(data.sell_rate); // Tambahkan sell rate juga
                            console.log('Yes, rate updated');
                        }
                    });
                    $.ajax({
                        url: '/getSellRate/' + selectedSourceId + '/' + originCurrency + '/' +
                            destinationCurrency,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Menampilkan buy rate
                            $('#sell_rate').val(data.sell_rate);
                            console.log('Yes woman');
                        }
                    });
                });

                // // Ketika origin dan destination dipilih
                // $('#origin, #destination').change(function() {
                //     var originCurrency = $('#origin').val();
                //     var destinationCurrency = $('#destination').val();
                //     var selectedSourceId = $('#select_source').val();

                //     // Mengambil buy rate menggunakan AJAX
                //     $.ajax({
                //         url: '/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' +
                //             destinationCurrency,
                //         type: 'GET',
                //         dataType: 'json',
                //         success: function(data) {
                //             // Menampilkan buy rate dan sell rate
                //             if (data.buy_rate !== null) {
                //                 $('#buy_rate').val(data.buy_rate);
                //             } else {
                //                 $('#buy_rate').val('data not found');
                //             }

                //             if (data.sell_rate !== null) {
                //                 $('#sell_rate').val(data.sell_rate);
                //             } else {
                //                 $('#sell_rate').val('data not found');
                //             }

                //             console.log('Yes, rate updated');
                //         }
                //     });
                // });



                // // Ketika origin dan destination dipilih
                // $('#origin, #destination').change(function() {
                //     var originCurrency = $('#origin').val();
                //     var destinationCurrency = $('#destination').val();
                //     var selectedSourceId = $('#select_source').val();

                //     // Mengambil buy rate menggunakan AJAX
                //     $.ajax({
                //         url: '/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' +
                //             destinationCurrency,
                //         type: 'GET',
                //         dataType: 'json',
                //         success: function(data) {
                //             // Menampilkan buy rate
                //             $('#buy_rate').val(data.buy_rate);
                //             console.log('Yes man');
                //         }
                //     });
                // });

                // // Ketika origin dan destination dipilih
                // $('#origin, #destination').change(function() {
                //     var originCurrency = $('#origin').val();
                //     var destinationCurrency = $('#destination').val();
                //     var selectedSourceId = $('#select_source').val();

                //     // Mengambil buy rate menggunakan AJAX
                //     $.ajax({
                //         url: '/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' +
                //             destinationCurrency,
                //         type: 'GET',
                //         dataType: 'json',
                //         success: function(data) {
                //             // Menampilkan buy rate
                //             $('#sell_rate').val(data.sell_rate);
                //             console.log('Yes woman');
                //         }
                //     });
                // });
            });
        </script>

        {{-- <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Event listener for the source selection dropdown
            $('#select_source').change(function() {
                var selectedSourceId = $(this).val();

                // Clear origin and destination dropdowns
                $('#origin').empty();
                $('#destination').empty();

                // Fetch origin and destination codes based on the selected source
                $.ajax({
                    url: '/getOriginAndDestination/' + selectedSourceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate origin dropdown
                        $.each(data.origins, function(key, value) {
                            $('#origin').append('<option value="' + value + '">' +
                                value + '</option>');
                        });

                        // Populate destination dropdown
                        $.each(data.destinations, function(key, value) {
                            $('#destination').append('<option value="' + value + '">' +
                                value + '</option>');
                        });
                    }
                });
            });

            // Event listener for origin and destination selection dropdowns
            $('#origin, #destination').change(function() {
                var originCurrency = $('#origin').val();
                var destinationCurrency = $('#destination').val();
                var selectedSourceId = $('#select_source').val();

                // Fetch buy and sell rates using AJAX
                $.ajax({
                    url: '/getSellRate/' + selectedSourceId + '/' + originCurrency + '/' +
                        destinationCurrency,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Display buy rate and sell rate
                        $('#buy_rate').val(data.buy_rate);
                        $('#sell_rate').val(data.sell_rate);
                    },
                    error: function(data) {
                        // Handle errors, e.g., display an error message
                        $('#buy_rate').val('Error');
                        $('#sell_rate').val('Error');
                    }
                });
            });

            // Event listener for the "Calculate" button
            $('#calculate').click(function() {
                var originCurrency = $('#origin').val();
                var destinationCurrency = $('#destination').val();
                var selectedSourceId = $('#select_source').val();
                var amount = parseFloat($('#amount').val());

                // Fetch buy and sell rates using AJAX (similar to the existing code)
                $.ajax({
                    url: '/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' +
                        destinationCurrency,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var buyRate = parseFloat(data.buy_rate);
                        var sellRate = parseFloat(data.sell_rate);

                        // Perform the conversion
                        var resultBuy = amount * buyRate;
                        var resultSell = amount * sellRate;

                        // Display the result
                        $('#resultBuy').val(resultBuy.toFixed(
                            2)); // You can adjust the number of decimal places as needed

                        // Display the result
                        $('#resultSell').val(resultSell.toFixed(
                            2)); // You can adjust the number of decimal places as needed
                    },
                    error: function(data) {
                        // Handle errors, e.g., display an error message
                        $('#result').val('Error');
                    }
                });
            });
        });
    </script> --}}
    @endsection
