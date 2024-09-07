@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success" role="alert">
                {{-- <i class="fa fa-check"></i> --}}
                <i class="fa-sharp fa-solid fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success" role="alert">
            {{-- <i class="fa fa-check"></i> --}}
            <i class="fa-sharp fa-solid fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif

@if (Session::get('error', false))
    <?php $data = Session::get('error'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-danger" role="alert">
                <i class="fa-sharp fa-solid fa-xmark"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
            <i class="fa-sharp fa-solid fa-xmark"></i>
            {{ $data }}
        </div>
    @endif
@endif
