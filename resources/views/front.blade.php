<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Money Changer XYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    @vite('resources/sass/app.scss')
</head>

<body class="bg-white">

    {{-- Navbar     --}}

    <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-black">
        <div class="container-md">
            {{-- <div class="d-flex justify-content-between"> --}}
            <a class="navbar-brand text-warning p-2 ">XYZ</a>
            <div class="d-flex">
                <button class="btn btn-outline-light btn-warning text-black" type="submit">Login</button>
            </div>
            {{-- <a class="navbar-brand text-warning" href="#">XYZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success btn-dark text-warning" type="submit">Login</button>
            </div> --}}
            {{-- </div> --}}
        </div>
    </nav>

    {{-- source --}}
    <div class="container">
        <ul class="nav nav-pills nav-fill mb-3 pb-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active cd fw-bolder rounded-0" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">XYZ</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link cd fw-bolder rounded-0" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">SOURCE</button>
            </li>
        </ul>
        <h4 class="fw-bolder">CALCULATOR</h4>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-1">
                <ul class="nav nav-pills nav-fill mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active cc fw-bolder rounded-0" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">BUY</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link cc fw-bolder rounded-0" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">SELL</button>
                    </li>
                </ul>
                <div class="tab-content pb-4" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <form class="row">
                            <div class="col-8 col-sm-8">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">

                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select mt-2" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1" class="text-bold">IDR</option>
                                    <option value="2">EUR</option>
                                    <option value="3">JPY</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <form class="row">

                            <div class="col-8 col-sm-8">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">USD</option>
                                    <option value="2">IDR</option>
                                    <option value="3">ETH</option>
                                </select>
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">SGD</option>
                                    <option value="2">THB</option>
                                    <option value="3">PHP</option>
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">

                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select mt-2" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">USD</option>
                                    <option value="2">IDR</option>
                                    <option value="3">ETH</option>
                                </select>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">

                <form id="add-currency-form" method="GET" action="{{ route('front.index') }}">
                    @csrf
                    <div class="">
                        <div class="col-sm-12 col-md-12 col-lg-12" style=" overflow: auto;" id="body1">
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead class="border-bot-warning">
                                        <tr>

                                            <th scope="col" class="border-bot-warning">
                                                <center>KURS</center>
                                            </th>
                                            <th scope="col">
                                                <center>KURS</center>
                                            </th>
                                            <th scope="col">
                                                <center>BUY</center>
                                            </th>
                                            <th scope="col">
                                                <center>SELL</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img"
                                                            src="{{ asset('img/united-states.png') }}"
                                                            alt=""><span>USA</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/malaysia.png') }}"
                                                            alt=""><span>MYA</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>120</center>
                                            </td>
                                            <td>
                                                <center>100</center>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img"
                                                            src="{{ asset('img/united-kingdom.png') }}"
                                                            alt=""><span>UK</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/thailand.png') }}"
                                                            alt=""><span>THB</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>120</center>
                                            </td>
                                            <td>
                                                <center>100</center>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/indonesia.png') }}"
                                                            alt=""><span>IDN</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img"
                                                            src="{{ asset('img/philippines.png') }}"
                                                            alt=""><span>PHI</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>120</center>
                                            </td>
                                            <td>
                                                <center>100</center>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img"
                                                            src="{{ asset('img/united-kingdom.png') }}"
                                                            alt=""><span>UK</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/thailand.png') }}"
                                                            alt=""><span>USA</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>120</center>
                                            </td>
                                            <td>
                                                <center>100</center>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/japan.png') }}"
                                                            alt=""><span>JPN</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="avatar">
                                                        <img class="avatar-img" src="{{ asset('img/sweden.png') }}"
                                                            alt=""><span>SWD</span>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>120</center>
                                            </td>
                                            <td>
                                                <center>100</center>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            {{-- <table class="table table-striped ">
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
                                                <th scope="col" colspan="2">
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
                                                <th>
                                                    <center>Buy</center>
                                                </th>
                                                <th>
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
                                <tbody class="align-middle table-light">
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
                                                        <td class="border-start-1 buy">
                                                            <center>
                                                                {{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}
                                                            </center>
                                                        </td>
                                                        <td class="border-start-1 sell">
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
                                                        <td class="border-start-1 buy ">
                                                            <center>
                                                                {{ $matchedPair ? number_format(doubleval($matchedPair->rate_buy)) : '-' }}
                                                            </center>
                                                        </td>
                                                        <td class="border-start-1 sell">
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
                            </table> --}}
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
                                        <input value="" type="text" class="form-control" name="name_source"
                                            id="source_name" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control" type="text" id="source_status" name="status"
                                            value="" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <input value="" type="text" class="form-control" name="time"
                                            id="source_time" readonly>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="destination_code_currencies">
                                        <i class="fa-sharp fa-solid fa-money-bills"></i>
                                    </label>
                                    <select class="form-select" id="destination" name="destination_code_currencies"
                                        required>
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
                                            class="form-control" name="rate_buy" placeholder="Input rate buy here"
                                            required>
                                        <span class="input-group-text">
                                            <i class="fa-sharp fa-solid fa-repeat"></i>
                                        </span>
                                        <input value="{{ old('rate_sell') }}" id="sell" type="text"
                                            class="form-control" name="rate_sell" placeholder="Input rate sell here"
                                            required>
                                        <label for="rate_sell" class="input-group-text">
                                            <i class="fa-sharp fa-solid fa-money-bill-1-wave"></i>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
            </div>
            </form>
            <div class="row">
                <div class="col">

                </div>
                <div class="col lni-text-align-right">
                    <nav aria-label="Page navigation example">

                        <ul class="pagination justify-content-end">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

        {{-- <div class="col-4 card bg-warning h-75 shadow-lg">
            
                <div class="card-body">
                    <ul class="nav nav-pills mb-3 justify-content-evenly " id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active bg-dark text-warning" id="pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">BUY</button>
                        </li>
                        <li class="nav-item " role="presentation">
                            <button class="nav-link bg-dark text-warning" id="pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">SELL</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form class="row">
                                <div class="col-sm-8">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">

                                </div>
                                <div class="col-sm-4">
                                    <select class="form-select mt-2" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1" class="text-bold">IDR</option>
                                        <option value="2">EUR</option>
                                        <option value="3">JPY</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <form class="row">

                                <div class="col-sm-8">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">USD</option>
                                        <option value="2">IDR</option>
                                        <option value="3">ETH</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">SGD</option>
                                        <option value="2">THB</option>
                                        <option value="3">PHP</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">

                                </div>
                                <div class="col-sm-4">
                                    <select class="form-select mt-2" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">USD</option>
                                        <option value="2">IDR</option>
                                        <option value="3">ETH</option>
                                    </select>
                                </div>
                               
                            </form>
                        </div>

                    </div>
                </div>
            </div> --}}
    </div>
    </div>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
