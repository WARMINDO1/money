{{-- Navbar --}}

@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-dark">
        <div class="container-md">
            <h3 class="navbar-brand text-warning p-2 w-100">MoneyChangerXYZ</h3>
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-light btn-warning text-dark" href="dashboard" type="button">Login</a>
            </div>
        </div>
    </nav> --}}

    {{-- source --}}
    <div class="container">
        <div class="row align-content-center">
            <div class="mb-3">
                {{-- <select class="form-select w-25" id="select_source">
                    <option value="" disabled selected hidden>Choose Source</option>
                    @foreach ($activeSources->sortBy('id') as $source)
                        <option value="{{ $source->id }}" data-id-source="{{ $source->id }}">
                            {{ $source->name }}
                        </option>
                    @endforeach
                </select> --}}
                <h3 align="right">{{ $activeSources[0]->name }}</h3>

            </div>
            <h4 class="fw-bolder">CALCULATOR</h4>
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

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <form class="row">
                            <div class="col-4 col-sm-4 mb-1">
                                <select class="form-select" id="origin_buy" name="origin_code_currencies" required>
                                    {{-- <option value="" disabled selected hidden>Origin Code Currency</option> --}}
                                    {{-- @foreach ($activeCurrencies as $sources)
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">
                                <input type="number" class="form-control" id="amount_buy" name="amount_buy">
                                <input type="hidden" class="form-control" id="buy_rate" name="buy_rate" readonly>
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select" id="destination_buy" name="destination_code_currencies"
                                    required>
                                    {{-- <option value="" disabled selected hidden>Destination Code Currency</option> --}}
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">
                                {{-- <input type="text" class="form-control" id="result_buy" name="result_buy" readonly> --}}
                                <h5 class="mt-2 ms-2" id="result_buy"></h5>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <form class="row">
                            <div class="col-4 col-sm-4 mb-1">
                                <select class="form-select" id="origin_sell" name="origin_code_currencies" required>
                                    {{-- <option value="" disabled selected hidden>Origin Code Currency</option> --}}
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">
                                <input type="number" class="form-control" id="amount_sell" name="amount_sell">
                                <input type="hidden" class="form-control" id="sell_rate" name="sell_rate" readonly>
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-select" id="destination_sell" name="destination_code_currencies"
                                    required>
                                    {{-- <option value="" disabled selected hidden>Destination Code Currency</option> --}}
                                </select>
                            </div>
                            <div class="col-8 col-sm-8">
                                <h5 class="mt-2 ms-2" id="result_sell"></h5>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-8" style=" overflow: auto;" id="body1">
                <div class="table-responsive-md">
                    <table class="table">
                        <thead class="border-bot-warning">
                            <tr>
                                <th scope="col" class="border-bot-warning">
                                    <center>Origin Currency</center>
                                </th>
                                <th scope="col">
                                    <center>Destination Currency</center>
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
                            @foreach ($activePairs as $pair)
                                <tr>
                                    <td class="origin-code">
                                        <center>{{ $pair->origin_code_currency }}</center>
                                    </td>
                                    <td class="border-start-1 destination-code">
                                        <center>{{ $pair->destination_code_currency }}
                                        </center>
                                    </td>
                                    <td class="border-start-1 buy">
                                        <center>
                                            {{ number_format(doubleval($pair->rate_buy)) }}
                                        </center>
                                    </td>
                                    <td class="border-start-1 sell">
                                        <center>
                                            {{ number_format(doubleval($pair->rate_sell)) }}
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        Showing {{ $activePairs->firstItem() }} to {{ $activePairs->lastItem() }} of
                        {{ $activePairs->total() }} entries
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm">
                            @if ($activePairs->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $activePairs->previousPageUrl() }}"
                                        aria-label="Previous">Previous</a>
                                </li>
                            @endif

                            @foreach ($activePairs->getUrlRange(1, $activePairs->lastPage()) as $page => $url)
                                <li class="page-item {{ $activePairs->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($activePairs->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $activePairs->nextPageUrl() }}"
                                        aria-label="Next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
        {{-- <div class="text-center">
            <h3 class="mb-0 ">Aztec Currency Charts </h3>
            <p>Review historical currency rates</p>
        </div>
        <div class="p-5">
            <div class="card h-100">
                <h5 class="card-header">Hoverable rows</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Amount</th>
                                <th>Change(24)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr class="table-dark">
                                <td><i class="bx bxl-angular bx-sm text-danger me-3"></i> <span class="fw-medium">US
                                        Dollar</span></td>
                                <td>1</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="bx bxl-react bx-sm text-info me-3"></i> <span class="fw-medium">React
                                        Project</span>
                                </td>
                                <td>Barry Hunter</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-success me-1">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="bx bxl-vuejs bx-sm text-success me-3"></i> <span class="fw-medium">VueJs
                                        Project</span></td>
                                <td>Trevor Baker</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="bx bxl-bootstrap bx-sm text-primary me-3"></i> <span class="fw-medium">Bootstrap
                                        Project</span></td>
                                <td>Jerry Milton</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="Christina Parker">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        <div class="pt-5 text-center">
            <h3 class="mb-0 ">Currency Profiles</h3>
        </div>
        <div class="container align-content-start pt-5 pb-5">
            <div class="row ">
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_503_3486)">
                                <rect width="28" height="20" rx="2" fill="white" />
                                <mask id="mask0_503_3486" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="28" height="20">
                                    <rect width="28" height="20" rx="2" fill="white" />
                                </mask>
                                <g mask="url(#mask0_503_3486)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M28 0H0V1.33333H28V0ZM28 2.66667H0V4H28V2.66667ZM0 5.33333H28V6.66667H0V5.33333ZM28 8H0V9.33333H28V8ZM0 10.6667H28V12H0V10.6667ZM28 13.3333H0V14.6667H28V13.3333ZM0 16H28V17.3333H0V16ZM28 18.6667H0V20H28V18.6667Z"
                                        fill="#D02F44" />
                                    <rect width="12" height="9.33333" fill="#46467F" />
                                    <g filter="url(#filter0_d_503_3486)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.66665 1.99999C2.66665 2.36818 2.36817 2.66666 1.99998 2.66666C1.63179 2.66666 1.33331 2.36818 1.33331 1.99999C1.33331 1.63181 1.63179 1.33333 1.99998 1.33333C2.36817 1.33333 2.66665 1.63181 2.66665 1.99999ZM5.33331 1.99999C5.33331 2.36818 5.03484 2.66666 4.66665 2.66666C4.29846 2.66666 3.99998 2.36818 3.99998 1.99999C3.99998 1.63181 4.29846 1.33333 4.66665 1.33333C5.03484 1.33333 5.33331 1.63181 5.33331 1.99999ZM7.33331 2.66666C7.7015 2.66666 7.99998 2.36818 7.99998 1.99999C7.99998 1.63181 7.7015 1.33333 7.33331 1.33333C6.96512 1.33333 6.66665 1.63181 6.66665 1.99999C6.66665 2.36818 6.96512 2.66666 7.33331 2.66666ZM10.6666 1.99999C10.6666 2.36818 10.3682 2.66666 9.99998 2.66666C9.63179 2.66666 9.33331 2.36818 9.33331 1.99999C9.33331 1.63181 9.63179 1.33333 9.99998 1.33333C10.3682 1.33333 10.6666 1.63181 10.6666 1.99999ZM3.33331 3.99999C3.7015 3.99999 3.99998 3.70152 3.99998 3.33333C3.99998 2.96514 3.7015 2.66666 3.33331 2.66666C2.96512 2.66666 2.66665 2.96514 2.66665 3.33333C2.66665 3.70152 2.96512 3.99999 3.33331 3.99999ZM6.66665 3.33333C6.66665 3.70152 6.36817 3.99999 5.99998 3.99999C5.63179 3.99999 5.33331 3.70152 5.33331 3.33333C5.33331 2.96514 5.63179 2.66666 5.99998 2.66666C6.36817 2.66666 6.66665 2.96514 6.66665 3.33333ZM8.66665 3.99999C9.03484 3.99999 9.33331 3.70152 9.33331 3.33333C9.33331 2.96514 9.03484 2.66666 8.66665 2.66666C8.29846 2.66666 7.99998 2.96514 7.99998 3.33333C7.99998 3.70152 8.29846 3.99999 8.66665 3.99999ZM10.6666 4.66666C10.6666 5.03485 10.3682 5.33333 9.99998 5.33333C9.63179 5.33333 9.33331 5.03485 9.33331 4.66666C9.33331 4.29847 9.63179 3.99999 9.99998 3.99999C10.3682 3.99999 10.6666 4.29847 10.6666 4.66666ZM7.33331 5.33333C7.7015 5.33333 7.99998 5.03485 7.99998 4.66666C7.99998 4.29847 7.7015 3.99999 7.33331 3.99999C6.96512 3.99999 6.66665 4.29847 6.66665 4.66666C6.66665 5.03485 6.96512 5.33333 7.33331 5.33333ZM5.33331 4.66666C5.33331 5.03485 5.03484 5.33333 4.66665 5.33333C4.29846 5.33333 3.99998 5.03485 3.99998 4.66666C3.99998 4.29847 4.29846 3.99999 4.66665 3.99999C5.03484 3.99999 5.33331 4.29847 5.33331 4.66666ZM1.99998 5.33333C2.36817 5.33333 2.66665 5.03485 2.66665 4.66666C2.66665 4.29847 2.36817 3.99999 1.99998 3.99999C1.63179 3.99999 1.33331 4.29847 1.33331 4.66666C1.33331 5.03485 1.63179 5.33333 1.99998 5.33333ZM3.99998 5.99999C3.99998 6.36819 3.7015 6.66666 3.33331 6.66666C2.96512 6.66666 2.66665 6.36819 2.66665 5.99999C2.66665 5.6318 2.96512 5.33333 3.33331 5.33333C3.7015 5.33333 3.99998 5.6318 3.99998 5.99999ZM5.99998 6.66666C6.36817 6.66666 6.66665 6.36819 6.66665 5.99999C6.66665 5.6318 6.36817 5.33333 5.99998 5.33333C5.63179 5.33333 5.33331 5.6318 5.33331 5.99999C5.33331 6.36819 5.63179 6.66666 5.99998 6.66666ZM9.33331 5.99999C9.33331 6.36819 9.03484 6.66666 8.66665 6.66666C8.29846 6.66666 7.99998 6.36819 7.99998 5.99999C7.99998 5.6318 8.29846 5.33333 8.66665 5.33333C9.03484 5.33333 9.33331 5.6318 9.33331 5.99999ZM9.99998 8C10.3682 8 10.6666 7.70152 10.6666 7.33333C10.6666 6.96514 10.3682 6.66666 9.99998 6.66666C9.63179 6.66666 9.33331 6.96514 9.33331 7.33333C9.33331 7.70152 9.63179 8 9.99998 8ZM7.99998 7.33333C7.99998 7.70152 7.7015 8 7.33331 8C6.96512 8 6.66665 7.70152 6.66665 7.33333C6.66665 6.96514 6.96512 6.66666 7.33331 6.66666C7.7015 6.66666 7.99998 6.96514 7.99998 7.33333ZM4.66665 8C5.03484 8 5.33331 7.70152 5.33331 7.33333C5.33331 6.96514 5.03484 6.66666 4.66665 6.66666C4.29846 6.66666 3.99998 6.96514 3.99998 7.33333C3.99998 7.70152 4.29846 8 4.66665 8ZM2.66665 7.33333C2.66665 7.70152 2.36817 8 1.99998 8C1.63179 8 1.33331 7.70152 1.33331 7.33333C1.33331 6.96514 1.63179 6.66666 1.99998 6.66666C2.36817 6.66666 2.66665 6.96514 2.66665 7.33333Z"
                                            fill="url(#paint0_linear_503_3486)" />
                                    </g>
                                </g>
                            </g>
                            <defs>
                                <filter id="filter0_d_503_3486" x="1.33331" y="1.33333" width="9.33331" height="7.66667"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="1" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_503_3486" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_503_3486"
                                        result="shape" />
                                </filter>
                                <linearGradient id="paint0_linear_503_3486" x1="1.33331" y1="1.33333" x2="1.33331"
                                    y2="7.99999" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" />
                                    <stop offset="1" stop-color="#F0F0F0" />
                                </linearGradient>
                                <clipPath id="clip0_503_3486">
                                    <rect width="28" height="20" rx="2" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>USD - US Dollar
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_2543)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_2543" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_2543)">
                        <rect width="28" height="20" fill="#043CAE"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0572 4.27615L14 4.00001L14.9428 4.27615L14.6666 3.33334L14.9428 2.39053L14 2.66668L13.0572 2.39053L13.3333 3.33334L13.0572 4.27615ZM13.0572 17.6095L14 17.3333L14.9428 17.6095L14.6666 16.6667L14.9428 15.7239L14 16L13.0572 15.7239L13.3333 16.6667L13.0572 17.6095ZM20.6666 10.6667L19.7238 10.9428L20 10L19.7238 9.0572L20.6666 9.33334L21.6095 9.0572L21.3333 10L21.6095 10.9428L20.6666 10.6667ZM6.3905 10.9428L7.33331 10.6667L8.27612 10.9428L7.99998 10L8.27612 9.0572L7.33331 9.33334L6.3905 9.0572L6.66665 10L6.3905 10.9428ZM19.7735 7.33334L18.8307 7.60948L19.1068 6.66668L18.8307 5.72387L19.7735 6.00001L20.7163 5.72387L20.4401 6.66668L20.7163 7.60948L19.7735 7.33334ZM7.28367 14.2762L8.22648 14L9.16929 14.2762L8.89314 13.3333L9.16929 12.3905L8.22648 12.6667L7.28367 12.3905L7.55981 13.3333L7.28367 14.2762ZM17.3333 4.89317L16.3905 5.16932L16.6666 4.22651L16.3905 3.2837L17.3333 3.55984L18.2761 3.2837L18 4.22651L18.2761 5.16932L17.3333 4.89317ZM9.72384 16.7163L10.6666 16.4402L11.6095 16.7163L11.3333 15.7735L11.6095 14.8307L10.6666 15.1068L9.72384 14.8307L9.99998 15.7735L9.72384 16.7163ZM19.7735 14L18.8307 14.2762L19.1068 13.3333L18.8307 12.3905L19.7735 12.6667L20.7163 12.3905L20.4401 13.3333L20.7163 14.2762L19.7735 14ZM7.28367 7.60948L8.22648 7.33334L9.16929 7.60948L8.89314 6.66668L9.16929 5.72387L8.22648 6.00001L7.28367 5.72387L7.55981 6.66668L7.28367 7.60948ZM17.3333 16.4402L16.3905 16.7163L16.6666 15.7735L16.3905 14.8307L17.3333 15.1068L18.2761 14.8307L18 15.7735L18.2761 16.7163L17.3333 16.4402ZM9.72384 5.16932L10.6666 4.89317L11.6095 5.16932L11.3333 4.22651L11.6095 3.2837L10.6666 3.55984L9.72384 3.2837L9.99998 4.22651L9.72384 5.16932Z" fill="#FFD429"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_2543">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>EUR - Euro</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_2952)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_2952" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_2952)">
                        <rect width="28" height="20" fill="#0A17A7"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M-1.28244 -1.91644L10.6667 6.14335V-1.33333H17.3334V6.14335L29.2825 -1.91644L30.7737 0.294324L21.3263 6.66667H28V13.3333H21.3263L30.7737 19.7057L29.2825 21.9165L17.3334 13.8567V21.3333H10.6667V13.8567L-1.28244 21.9165L-2.77362 19.7057L6.67377 13.3333H2.95639e-05V6.66667H6.67377L-2.77362 0.294324L-1.28244 -1.91644Z" fill="white"/>
                        <path d="M18.668 6.33219L31.3333 -2" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"/>
                        <path d="M20.0128 13.6975L31.3666 21.3503" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"/>
                        <path d="M8.00555 6.31046L-3.83746 -1.67099" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"/>
                        <path d="M9.29006 13.6049L-3.83746 22.3105" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12H12V20H16V12H28V8H16V0H12V8H0V12Z" fill="#E6273E"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_2952">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>GBP - British Pound</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_2789)">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="#F5F5F5" stroke-width="0.5"/>
                        <mask id="mask0_503_2789" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="white" stroke-width="0.5"/>
                        </mask>
                        <g mask="url(#mask0_503_2789)">
                        <rect x="20" width="8" height="20" fill="#FF3131"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20H8V0H0V20Z" fill="#FF3131"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1118 9.22154C15.8786 9.45474 15.4845 9.24386 15.5492 8.92046L16 6.66668L14.6666 7.33334L14 5.33334L13.3333 7.33334L12 6.66668L12.4507 8.92046C12.5154 9.24386 12.1214 9.45474 11.8882 9.22154L11.569 8.90238C11.4388 8.7722 11.2278 8.7722 11.0976 8.90238L10.6666 9.33334L9.33331 8.66668L9.99998 10L9.56901 10.431C9.43884 10.5611 9.43884 10.7722 9.56902 10.9024L11.3333 12.6667H13.3333L13.6666 14.6667H14.3333L14.6666 12.6667H16.6666L18.4309 10.9024C18.5611 10.7722 18.5611 10.5611 18.4309 10.431L18 10L18.6666 8.66668L17.3333 9.33334L16.9023 8.90238C16.7722 8.7722 16.5611 8.7722 16.4309 8.90238L16.1118 9.22154Z" fill="#FF3131"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_2789">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>CAD - Canadian Dollar</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_4369)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_4369" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_4369)">
                        <rect width="28" height="20" fill="#0A17A7"/>
                        <path d="M0 -0.333333H-0.901086L-0.21693 0.253086L4.33333 4.15331V5.16179L-0.193746 8.39542L-0.333333 8.49513V8.66667V9.33333V9.93475L0.176666 9.616L5.42893 6.33333H6.55984L11.0821 9.56351C11.176 9.6306 11.2886 9.66667 11.404 9.66667C11.9182 9.66667 12.1548 9.02698 11.7644 8.69237L7.66667 5.18002V4.17154L12.0542 1.03762C12.2294 0.912475 12.3333 0.710428 12.3333 0.495127V0V-0.601416L11.8233 -0.282666L6.57107 3H5.44016L0.860413 -0.271244L0.773488 -0.333333H0.666667H0Z" fill="#FF2E3B" stroke="white" stroke-width="0.666667"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.33333V6H4.66667V9.33333C4.66667 9.70152 4.96514 10 5.33333 10H6.66667C7.03486 10 7.33333 9.70152 7.33333 9.33333V6H12C12.3682 6 12.6667 5.70152 12.6667 5.33333V4C12.6667 3.63181 12.3682 3.33333 12 3.33333H7.33333V0H4.66667V3.33333H0Z" fill="url(#paint0_linear_503_4369)"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4H5.33333V3.33333V0H6.66667V3.33333V4H12V5.33333H6.66667V6V9.33333H5.33333V6V5.33333H0V4Z" fill="url(#paint1_linear_503_4369)"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 16.3333L4.82443 16.9514L5.04894 15.6424L4.09789 14.7153L5.41221 14.5243L6 13.3333L6.58779 14.5243L7.90211 14.7153L6.95106 15.6424L7.17557 16.9514L6 16.3333Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9998 17.3333L19.057 17.6095L19.3332 16.6666L19.057 15.7238L19.9998 16L20.9426 15.7238L20.6665 16.6666L20.9426 17.6095L19.9998 17.3333Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9998 4.66669L19.057 4.94283L19.3332 4.00002L19.057 3.05721L19.9998 3.33335L20.9426 3.05721L20.6665 4.00002L20.9426 4.94283L19.9998 4.66669Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.9998 8.66669L23.057 8.94283L23.3332 8.00002L23.057 7.05721L23.9998 7.33335L24.9426 7.05721L24.6665 8.00002L24.9426 8.94283L23.9998 8.66669Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9998 10L15.057 10.2761L15.3332 9.33333L15.057 8.39052L15.9998 8.66667L16.9426 8.39052L16.6665 9.33333L16.9426 10.2761L15.9998 10Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.0002 11.6667L21.5288 11.8048L21.6668 11.3334L21.5288 10.8619L22.0002 11L22.4716 10.8619L22.3335 11.3334L22.4716 11.8048L22.0002 11.6667Z" fill="white"/>
                        </g>
                        </g>
                        <defs>
                        <linearGradient id="paint0_linear_503_4369" x1="0" y1="0" x2="0" y2="10" gradientUnits="userSpaceOnUse">
                        <stop stop-color="white"/>
                        <stop offset="1" stop-color="#F0F0F0"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_503_4369" x1="0" y1="0" x2="0" y2="9.33333" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF2E3B"/>
                        <stop offset="1" stop-color="#FC0D1B"/>
                        </linearGradient>
                        <clipPath id="clip0_503_4369">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>AUD - Australian Dollar</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_3081)">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="#F5F5F5" stroke-width="0.5"/>
                        <mask id="mask0_503_3081" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="white" stroke-width="0.5"/>
                        </mask>
                        <g mask="url(#mask0_503_3081)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 16C17.3137 16 20 13.3137 20 10C20 6.68629 17.3137 4 14 4C10.6863 4 8 6.68629 8 10C8 13.3137 10.6863 16 14 16Z" fill="url(#paint0_linear_503_3081)"/>
                        </g>
                        </g>
                        <defs>
                        <linearGradient id="paint0_linear_503_3081" x1="8" y1="4" x2="8" y2="16" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#D81441"/>
                        <stop offset="1" stop-color="#BB0831"/>
                        </linearGradient>
                        <clipPath id="clip0_503_3081">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>JPY - Japanese Yen</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_2709)">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="#F5F5F5" stroke-width="0.5"/>
                        <mask id="mask0_503_2709" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="white" stroke-width="0.5"/>
                        </mask>
                        <g mask="url(#mask0_503_2709)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.66667H28V0H0V6.66667Z" fill="#FFA44A"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20H28V13.3333H0V20Z" fill="#1A9F0B"/>
                        <path d="M14 12.3333C15.2887 12.3333 16.3333 11.2887 16.3333 10C16.3333 8.71134 15.2887 7.66667 14 7.66667C12.7113 7.66667 11.6667 8.71134 11.6667 10C11.6667 11.2887 12.7113 12.3333 14 12.3333Z" fill="#181A93" fill-opacity="0.15" stroke="#181A93" stroke-width="0.666667"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.6667C14.3682 10.6667 14.6666 10.3682 14.6666 10C14.6666 9.63182 14.3682 9.33334 14 9.33334C13.6318 9.33334 13.3333 9.63182 13.3333 10C13.3333 10.3682 13.6318 10.6667 14 10.6667Z" fill="#181A93"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_2709">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>INR - Indian Rupee</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_4008)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_4008" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_4008)">
                        <rect width="28" height="20" fill="#0A17A7"/>
                        <path d="M0 -0.333333H-0.901086L-0.21693 0.253086L4.33333 4.15331V5.16179L-0.193746 8.39542L-0.333333 8.49513V8.66667V9.33333V9.93475L0.176666 9.616L5.42893 6.33333H6.55984L11.0821 9.56351C11.176 9.6306 11.2886 9.66667 11.404 9.66667C11.9182 9.66667 12.1548 9.02698 11.7644 8.69237L7.66667 5.18002V4.17154L12.0542 1.03762C12.2294 0.912475 12.3333 0.710428 12.3333 0.495127V0V-0.601416L11.8233 -0.282666L6.57107 3H5.44016L0.860413 -0.271244L0.773488 -0.333333H0.666667H0Z" fill="#FF2E3B" stroke="white" stroke-width="0.666667"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.33333V6H4.66667V9.33333C4.66667 9.70152 4.96514 10 5.33333 10H6.66667C7.03486 10 7.33333 9.70152 7.33333 9.33333V6H12C12.3682 6 12.6667 5.70152 12.6667 5.33333V4C12.6667 3.63181 12.3682 3.33333 12 3.33333H7.33333V0H4.66667V3.33333H0Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4H5.33333V3.33333V0H6.66667V3.33333V4H12V5.33333H6.66667V6V9.33333H5.33333V6V5.33333H0V4Z" fill="#FF2E3B"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 17.3333L19.0572 17.6095L19.3333 16.6667L19.0572 15.7239L20 16L20.9428 15.7239L20.6666 16.6667L20.9428 17.6095L20 17.3333Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 4.66667L19.0572 4.94281L19.3333 4.00001L19.0572 3.0572L20 3.33334L20.9428 3.0572L20.6666 4.00001L20.9428 4.94281L20 4.66667Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 8.66667L23.0572 8.94281L23.3333 8.00001L23.0572 7.0572L24 7.33334L24.9428 7.0572L24.6666 8.00001L24.9428 8.94281L24 8.66667Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 10L15.0572 10.2761L15.3333 9.33333L15.0572 8.39052L16 8.66667L16.9428 8.39052L16.6666 9.33333L16.9428 10.2761L16 10Z" fill="#CA1931"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_4008">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>NZD - New Zealand Dollar</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_3372)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_3372" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_3372)">
                        <rect width="28" height="20" fill="#FF0000"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12H8.33333C8.14924 12 8 11.8508 8 11.6667V8.33333C8 8.14924 8.14924 8 8.33333 8H12V4.33333C12 4.14924 12.1492 4 12.3333 4H15.6667C15.8508 4 16 4.14924 16 4.33333V8H19.6667C19.8508 8 20 8.14924 20 8.33333V11.6667C20 11.8508 19.8508 12 19.6667 12H16V15.6667C16 15.8508 15.8508 16 15.6667 16H12.3333C12.1492 16 12 15.8508 12 15.6667V12Z" fill="white"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_3372">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>CHF - Swiss Franc</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_4008)">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        <mask id="mask0_503_4008" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_503_4008)">
                        <rect width="28" height="20" fill="#0A17A7"/>
                        <path d="M0 -0.333333H-0.901086L-0.21693 0.253086L4.33333 4.15331V5.16179L-0.193746 8.39542L-0.333333 8.49513V8.66667V9.33333V9.93475L0.176666 9.616L5.42893 6.33333H6.55984L11.0821 9.56351C11.176 9.6306 11.2886 9.66667 11.404 9.66667C11.9182 9.66667 12.1548 9.02698 11.7644 8.69237L7.66667 5.18002V4.17154L12.0542 1.03762C12.2294 0.912475 12.3333 0.710428 12.3333 0.495127V0V-0.601416L11.8233 -0.282666L6.57107 3H5.44016L0.860413 -0.271244L0.773488 -0.333333H0.666667H0Z" fill="#FF2E3B" stroke="white" stroke-width="0.666667"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.33333V6H4.66667V9.33333C4.66667 9.70152 4.96514 10 5.33333 10H6.66667C7.03486 10 7.33333 9.70152 7.33333 9.33333V6H12C12.3682 6 12.6667 5.70152 12.6667 5.33333V4C12.6667 3.63181 12.3682 3.33333 12 3.33333H7.33333V0H4.66667V3.33333H0Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4H5.33333V3.33333V0H6.66667V3.33333V4H12V5.33333H6.66667V6V9.33333H5.33333V6V5.33333H0V4Z" fill="#FF2E3B"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 17.3333L19.0572 17.6095L19.3333 16.6667L19.0572 15.7239L20 16L20.9428 15.7239L20.6666 16.6667L20.9428 17.6095L20 17.3333Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20 4.66667L19.0572 4.94281L19.3333 4.00001L19.0572 3.0572L20 3.33334L20.9428 3.0572L20.6666 4.00001L20.9428 4.94281L20 4.66667Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 8.66667L23.0572 8.94281L23.3333 8.00001L23.0572 7.0572L24 7.33334L24.9428 7.0572L24.6666 8.00001L24.9428 8.94281L24 8.66667Z" fill="#CA1931"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 10L15.0572 10.2761L15.3333 9.33333L15.0572 8.39052L16 8.66667L16.9428 8.39052L16.6666 9.33333L16.9428 10.2761L16 10Z" fill="#CA1931"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_4008">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>ZAR - South Africa Rand</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_2726)">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="#F5F5F5" stroke-width="0.5"/>
                        <mask id="mask0_503_2726" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="white" stroke-width="0.5"/>
                        </mask>
                        <g mask="url(#mask0_503_2726)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.3333H28V6.66667H0V13.3333Z" fill="#0C47B7"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20H28V13.3333H0V20Z" fill="#E53B35"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_2726">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>RUB - Russian Ruble</a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 py-1">
                    <a href="#" class="stretched-link link-underline link-underline-opacity-0 link-underline-opacity-75-hover"><svg width="26px" height="18px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_503_4883)">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="#F5F5F5" stroke-width="0.5"/>
                        <mask id="mask0_503_4883" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
                        <rect x="0.25" y="0.25" width="27.5" height="19.5" rx="1.75" fill="white" stroke="white" stroke-width="0.5"/>
                        </mask>
                        <g mask="url(#mask0_503_4883)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.3333H28V6.66666H0V13.3333Z" fill="#06A77C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20H28V13.3333H0V20Z" fill="#E32E19"/>
                        </g>
                        </g>
                        <defs>
                        <clipPath id="clip0_503_4883">
                        <rect width="28" height="20" rx="2" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>BGR - Bulgarian Lev</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Ketika source yang berbeda dipilih
        //     document.getElementById('select_source').addEventListener('change', function() {
        //         var selectedSourceId = this.value;

        //         // Menghapus semua opsi yang ada
        //         document.getElementById('origin').innerHTML = '';
        //         document.getElementById('destination').innerHTML = '';

        //         // Mengambil data origin dan destination berdasarkan source yang dipilih
        //         fetch('/getOriginAndDestination/' + selectedSourceId)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Network response was not ok');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 // Mengisi opsi origin
        //                 data.origins.forEach(function(value) {
        //                     var option = document.createElement('option');
        //                     option.value = value;
        //                     option.textContent = value;
        //                     document.getElementById('origin').appendChild(option);
        //                 });

        //                 // Mengisi opsi destination
        //                 data.destinations.forEach(function(value) {
        //                     var option = document.createElement('option');
        //                     option.value = value;
        //                     option.textContent = value;
        //                     document.getElementById('destination').appendChild(option);
        //                 });
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //             });
        //     });

        //     // Ketika origin dan destination dipilih
        //     document.getElementById('origin').addEventListener('change', updateRates);
        //     document.getElementById('destination').addEventListener('change', updateRates);

        //     function updateRates() {
        //         var originCurrency = document.getElementById('origin').value;
        //         var destinationCurrency = document.getElementById('destination').value;
        //         var selectedSourceId = document.getElementById('select_source').value;


        //         // Mengambil buy rate menggunakan Fetch API
        //         fetch('/getRate/' + selectedSourceId + '/' + originCurrency + '/' + destinationCurrency)
        //         headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF jika digunakan
        //             },
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Network response was not ok');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 // Menampilkan buy rate
        //                 document.getElementById('buy_rate').value = data.buy_rate;
        //                 document.getElementById('sell_rate').value = data.sell_rate; // Tambahkan sell rate juga
        //                 console.log('Yes, rate updated');
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //             });
        //     }
        // });

        document.addEventListener('DOMContentLoaded', function() {

            // // Ketika source yang berbeda dipilih
            // document.getElementById('select_source').addEventListener('change', function() {
            //     var selectedSourceId = this.value;

            //     // Menghapus semua opsi yang ada
            //     document.getElementById('origin_buy').innerHTML = '';
            //     document.getElementById('destination_buy').innerHTML = '';
            //     document.getElementById('origin_sell').innerHTML = '';
            //     document.getElementById('destination_sell').innerHTML = '';

            //     // Mengambil data origin dan destination berdasarkan source yang dipilih
            //     fetch('/getOriginAndDestination/' + selectedSourceId)
            //         .then(response => {
            //             if (!response.ok) {
            //                 throw new Error('Network response was not ok');
            //             }
            //             return response.json();
            //         })
            //         .then(data => {
            //             // Mengisi opsi origin untuk tab "BUY"
            //             data.origins.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('origin_buy').appendChild(option);
            //             });

            //             // Mengisi opsi destination untuk tab "BUY"
            //             data.destinations.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('destination_buy').appendChild(option);
            //             });

            //             // Mengisi opsi origin untuk tab "SELL"
            //             data.origins.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('origin_sell').appendChild(option);
            //             });

            //             // Mengisi opsi destination untuk tab "SELL"
            //             data.destinations.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('destination_sell').appendChild(option);
            //             });
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //         });
            // });

            // // Ketika source yang berbeda dipilih
            // document.getElementById('select_source').addEventListener('change', function() {
            //     var selectedSourceId = this.value;

            // // Menghapus semua opsi yang ada
            // document.getElementById('origin_buy').innerHTML = '';
            // document.getElementById('destination_buy').innerHTML = '';
            // document.getElementById('origin_sell').innerHTML = '';
            // document.getElementById('destination_sell').innerHTML = '';

            // Mengambil data origin dan destination berdasarkan source yang dipilih
            fetch('/getOriginAndDestination')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Mengisi opsi origin untuk tab "BUY"
                    data.origins.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        document.getElementById('origin_buy').appendChild(option);
                    });

                    // Mengisi opsi destination untuk tab "BUY"
                    data.destinations.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        document.getElementById('destination_buy').appendChild(option);
                    });

                    // Mengisi opsi origin untuk tab "SELL"
                    data.origins.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        document.getElementById('origin_sell').appendChild(option);
                    });

                    // Mengisi opsi destination untuk tab "SELL"
                    data.destinations.forEach(function(value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.textContent = value;
                        document.getElementById('destination_sell').appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            // });

            // // Dapatkan elemen-elemen yang diperlukan
            // var selectSourceText = document.getElementById('select_source');
            // var selectedSourceId = document.getElementById('selected_source_id').value;

            // // Temukan nama source yang aktif
            // var activeSourceOption = document.querySelector('#select_source option[data-id-source="' +
            //     selectedSourceId + '"]');
            // if (activeSourceOption) {
            //     selectSourceText.value = activeSourceOption.textContent;
            // }

            // document.getElementById('select_source').addEventListener('change', function() {
            //     var selectedSourceId = this.value;

            //     // // Menghapus semua opsi yang ada
            //     // document.getElementById('origin_buy').innerHTML = '';
            //     // document.getElementById('destination_buy').innerHTML = '';

            //     // Mengambil data origin dan destination untuk buy berdasarkan source yang dipilih
            //     fetch('/getOriginAndDestination/' + selectedSourceId)
            //         .then(response => {
            //             if (!response.ok) {
            //                 console.log("gagal nih");
            //                 throw new Error('Network response was not ok');
            //             }
            //             return response.json();
            //         })
            //         .then(data => {
            //             console.log("berhasil nih");
            //             // Mengisi opsi origin untuk tab "BUY"
            //             data.origins.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('origin_buy').appendChild(option);
            //             });

            //             // Mengisi opsi destination untuk tab "BUY"
            //             data.destinations.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('destination_buy').appendChild(option);
            //             });
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //         });
            // });

            // document.getElementById('select_source').addEventListener('change', function() {
            //     var selectedSourceId = this.value;

            //     // Menghapus semua opsi yang ada
            //     document.getElementById('origin_sell').innerHTML = '';
            //     document.getElementById('destination_sell').innerHTML = '';

            //     // Mengambil data origin dan destination untuk sell berdasarkan source yang dipilih
            //     fetch('/getOriginAndDestination/' + selectedSourceId)
            //         .then(response => {
            //             if (!response.ok) {
            //                 console.log("gagal nih");
            //                 throw new Error('Network response was not ok');
            //             }
            //             return response.json();
            //         })
            //         .then(data => {
            //             // Mengisi opsi origin untuk tab "SELL"
            //             data.origins.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('origin_sell').appendChild(option);
            //             });

            //             // Mengisi opsi destination untuk tab "SELL"
            //             data.destinations.forEach(function(value) {
            //                 var option = document.createElement('option');
            //                 option.value = value;
            //                 option.textContent = value;
            //                 document.getElementById('destination_sell').appendChild(option);
            //             });
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //         });
            // });

            // Ketika origin dan destination dipilih untuk tab "BUY"
            document.getElementById('origin_buy').addEventListener('change', updateBuyRate);
            document.getElementById('destination_buy').addEventListener('change', updateBuyRate);

            // Ketika origin dan destination dipilih untuk tab "SELL"
            document.getElementById('origin_sell').addEventListener('change', updateSellRate);
            document.getElementById('destination_sell').addEventListener('change', updateSellRate);

            function updateBuyRate() {
                var originCurrency = document.getElementById('origin_buy').value;
                var destinationCurrency = document.getElementById('destination_buy').value;
                // var selectedSourceId = document.getElementById('select_source').value;

                // Mengambil buy rate menggunakan Fetch API
                fetch('/getBuyRate/' + originCurrency + '/' + destinationCurrency, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF jika digunakan
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Menampilkan buy rate untuk tab "BUY"
                        document.getElementById('buy_rate').value = data.buy_rate;
                        console.log('Yes, buy rate updated');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function updateSellRate() {
                var originCurrency = document.getElementById('origin_sell').value;
                var destinationCurrency = document.getElementById('destination_sell').value;
                // var selectedSourceId = document.getElementById('select_source').value;

                // Mengambil sell rate menggunakan Fetch API
                fetch('/getSellRate/' + originCurrency + '/' + destinationCurrency, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF jika digunakan
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Menampilkan sell rate untuk tab "SELL"
                        document.getElementById('sell_rate').value = data.sell_rate;
                        console.log('Yes, sell rate updated');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }


            // Mengambil elemen-elemen yang diperlukan
            const originBuySelect = document.getElementById('origin_buy');
            const destinationBuySelect = document.getElementById('destination_buy');
            const amountBuyInput = document.getElementById('amount_buy');
            const buyRateInput = document.getElementById('buy_rate');
            const resultBuyInput = document.getElementById('result_buy');

            const originSellSelect = document.getElementById('origin_sell');
            const destinationSellSelect = document.getElementById('destination_sell');
            const amountSellInput = document.getElementById('amount_sell');
            const sellRateInput = document.getElementById('sell_rate');
            const resultSellInput = document.getElementById('result_sell');

            // Menambahkan event listener ketika memilih asal, tujuan, atau mengubah jumlah di tab "BUY"
            originBuySelect.addEventListener('change', function() {
                // Reset nilai input field saat origin diubah
                amountBuyInput.innerHTML = '';
                resultBuyInput.innerHTML = '';
            });

            destinationBuySelect.addEventListener('change', function() {
                // Reset nilai input field saat destination diubah
                amountBuyInput.innerHTML = '';
                resultBuyInput.innerHTML = '';
            });
            amountBuyInput.addEventListener('input', calculateBuyRate);

            // Menambahkan event listener ketika memilih asal, tujuan, atau mengubah jumlah di tab "SELL"
            originSellSelect.addEventListener('change', function() {
                // Reset nilai input field saat origin diubah
                amountSellInput.innerHTML = '';
                resultSellInput.innerHTML = '';
            });
            destinationSellSelect.addEventListener('change', function() {
                // Reset nilai input field saat destination diubah
                amountSellInput.innerHTML = '';
                resultSellInput.innerHTML = '';
            });
            amountSellInput.addEventListener('input', calculateSellRate);

            // Fungsi untuk menghitung rate dan menampilkannya
            function calculateBuyRate() {
                const origin = originBuySelect.value;
                const destination = destinationBuySelect.value;
                const rate = parseFloat(buyRateInput.value) || 0;
                const amount = parseFloat(amountBuyInput.value) ||
                    0; // Mengambil nilai amount atau 0 jika tidak ada input

                // Hitung rate Buy
                const buyRate = (rate * amount).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

                // // Menampilkan hasil kalkulasi
                // resultBuyInput.value = buyRate;
                resultBuyInput.textContent = buyRate;
            }

            function calculateSellRate() {
                const origin = originSellSelect.value;
                const destination = destinationSellSelect.value;
                const rate = parseFloat(sellRateInput.value) || 0;
                const amount = parseFloat(amountSellInput.value) ||
                    0; // Mengambil nilai amount atau 0 jika tidak ada input

                // Hitung rate Sell
                const sellRate = (rate * amount).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

                // // Menampilkan hasil kalkulasi
                // resultSellInput.value = sellRate;

                resultSellInput.textContent = sellRate;
            }
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Ketika source yang berbeda dipilih
        //     document.getElementById('select_source').addEventListener('change', function() {
        //         var selectedSourceId = this.value;

        //         // Menghapus semua opsi yang ada
        //         document.getElementById('origin').innerHTML = '';
        //         document.getElementById('destination').innerHTML = '';

        //         // Mengambil data origin dan destination berdasarkan source yang dipilih
        //         fetch('/getOriginAndDestination/' + selectedSourceId)
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Network response was not ok');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 // Mengisi opsi origin
        //                 data.origins.forEach(function(value) {
        //                     var option = document.createElement('option');
        //                     option.value = value;
        //                     option.textContent = value;
        //                     document.getElementById('origin').appendChild(option);
        //                 });

        //                 // Mengisi opsi destination
        //                 data.destinations.forEach(function(value) {
        //                     var option = document.createElement('option');
        //                     option.value = value;
        //                     option.textContent = value;
        //                     document.getElementById('destination').appendChild(option);
        //                 });
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //             });
        //     });

        //     // Ketika origin dan destination dipilih
        //     document.getElementById('origin').addEventListener('change', updateRates);
        //     document.getElementById('destination').addEventListener('change', updateRates);

        //     function updateRates() {
        //         var originCurrency = document.getElementById('origin').value;
        //         var destinationCurrency = document.getElementById('destination').value;
        //         var selectedSourceId = document.getElementById('select_source').value;

        //         // Mengambil buy rate menggunakan Fetch API
        //         fetch('/getBuyRate/' + selectedSourceId + '/' + originCurrency + '/' + destinationCurrency, {
        //                 method: 'GET',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                     'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF jika digunakan
        //                 },
        //             })
        //             .then(response => {
        //                 if (!response.ok) {
        //                     throw new Error('Network response was not ok');
        //                 }
        //                 return response.json();
        //             })
        //             .then(data => {
        //                 // Menampilkan buy rate
        //                 document.getElementById('buy_rate').value = data.buy_rate;
        //                 document.getElementById('sell_rate').value = data.sell_rate; // Tambahkan sell rate juga
        //                 console.log('Yes, rate updated');
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //             });
        //     }
        // });
    </script>
@endsection
