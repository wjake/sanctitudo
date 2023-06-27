@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <h5 class="text-center">
            {{ count($events) }} Upcoming Events 
            <a class="btn btn-outline-secondary btn-sm" style="--bs-btn-padding-y: 0rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .75rem;"
            href="/events">View All</a>
        </h5>
        <hr />
        <div class="row">
            @foreach ($events as $event)
                <div class="col-12 col-md-6">
                    <x-event :event="$event"/>
                    <br />
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4">
        <h5 class="text-center">{{ count($company->members) }} Active members</h5>
        <hr />
        <div class="row">
            @foreach ($company->members as $member)
                <div class="col-6 col-sm-6 col-lg-12 col-xl-6">
                    <x-member :member="$member"/>
                </div>
            @endforeach
        </div>
    </div>
</div>

@stop