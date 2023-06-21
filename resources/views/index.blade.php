@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <h3>Upcoming Events</h3>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-sm-6">
                    <x-event :event="$event"/>
                    <br />
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4">
        <h3 class="text-center">Active Members</h3>
        @foreach ($company->members as $member)
            <x-member :member="$member"/>
        @endforeach
    </div>
</div>

@stop