<div class="row page-header">
    <div class="col-md-6">
        <h3>{{ $head }} 
        @if ($button != '')
            <a href="{{ $link }}" class="btn btn-primary ml-5">{{ $button }}</a>
        @endif
        </h3>
    </div>
    <div class="col-md-6">
        <div class="float-right right-content">
            <ul class="nav">
                <li class="mr-2"><a href="/">Home </a></li>
                @if ($second)
                    <li class="mr-2"><a href="{{ route($second . '.index') }}">/ {{ $second }}</a></li>
                @endif

                <li> / {{ $head }}</li>
            </ul>
        </div>
    </div>
</div>