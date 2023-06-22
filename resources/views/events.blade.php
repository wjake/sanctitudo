@extends('layouts.index')

@section('content')

<h3 class="text-center">Events</h3>
{{ $events->onEachSide(1)->links() }}
<div class="row">
    @foreach ($events as $event)
        <div class="col-sm-6">
            <x-event :event="$event"/>
            <br />
        </div>
    @endforeach
</div>

@stop