@extends('layouts.index')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-8">
        <h3>Upcoming Events</h3>
        <hr />
        <div class="row">
            @foreach ($events as $event)
                <div class="col-sm-6">
                    <x-event :event="$event"/>
                    <br />
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-4">
        <h3>Active Members</h3>
        <hr />
        <ul class="list-group list-group-flush">
            @foreach ($company->members as $member)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <img src="{{ $member->avatar }}" alt="Ninja Icon" width="28" height="28">
                    {{ $member->name }}
                    <span class="badge"><img src="{{ $member->rankIcon }}" alt="Ninja Icon"></span>
                </li>
            @endforeach
        </ul>
    </div>
  </div>
</div>

@stop