@extends('layouts.index')

@section('content')

{{ $events->onEachSide(1)->links() }}
<div class="row">
    @foreach ($events as $event)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <x-event :event="$event"/>
            <br />
        </div>
    @endforeach
</div>

@stop