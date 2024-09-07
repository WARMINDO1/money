@extends('layouts.app')

@section('title')
    Currencies List
@endsection

@section('content')
    <div class="bg-light rounded">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Currencies</h5>
                <h6 class="card-subtitle mb-2 text-muted">Manage your currencies here.</h6>

                <div class="mt-2">
                    @include('layouts.includes.messages')
                </div>

                {{-- <div class="container my-5 py-5 px-5 mx-5">
                    <!-- Search input -->
                    <form>
                        <input type="search" class="form-control" placeholder="Find user here" name="search">
                    </form>

                    <ul class="list-group mt-3">
                        @forelse($currencies as $currency)
                            <li class="list-group-item">{{ $currency->name }}</li>
                        @empty
                            <li class="list-group-item list-group-item-danger">User Not Found.</li>
                        @endforelse
                    </ul>
                </div> --}}

                {{-- <form action="{{ route('currencies.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control mb-3" placeholder="search" name="q">
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="form-control mb-3" value="Search">
                        </div>
                    </div>
                </form> --}}

                <div class="row mb-2 text-start">
                    <div class="col-4">
                        <form action="{{ route('currencies.index') }}" method="get">
                            <input type="search" class="form-control form-control-sm" placeholder="search" name="q">
                        </form>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('currencies.index') }}" class="btn btn-outline-dark btn-sm">
                            Clear Search
                            <i class="fa-sharp fa-solid fa-magnifying-glass-minus"></i>
                        </a>
                    </div>
                    <div class="col-5 text-end">
                        @can('currency-create')
                            <a href="{{ route('currencies.create') }}" class="btn btn-outline-success btn-sm float-right">
                                Add currency
                                {{-- <i class="fa-sharp fa-solid fa-money-bills"></i> --}}
                                <i class="fa-sharp fa-solid fa-money-bill"></i>
                            </a>
                        @endcan
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">No</th>
                            <th scope="col" width="10%">Code</th>
                            <th scope="col" width="15%">Name</th>
                            <th scope="col" width="1%" colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currencies as $key => $currency)
                            <tr>
                                <th scope="row">{{ $currency->id }}</th>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>
                                    {{-- <a href="{{ route('currencies.show', $currency->id) }}"
                                        class="btn btn-outline-warning btn-sm">
                                        <i class="fa-sharp fa-solid fa-eye"></i>
                                    </a> --}}
                                </td>
                                <td>
                                    <a href="{{ route('currencies.edit', $currency->id) }}"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fa-sharp fa-solid fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['currencies.destroy', $currency->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::button('<i class="fa-solid fa-trash-can"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-outline-danger btn-sm',
                                    ]) !!}
                                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} --}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex">
                    {{ $currencies->withQueryString()->links() }}
                    {{-- {!! $currencies->links() !!} --}}
                </div>

            </div>
        </div>
    </div>
@endsection
