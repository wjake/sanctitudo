@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-lg-8">
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
        <div class="row">
            @foreach ($company->members as $member)
                <div class="col-12 col-sm-6 col-lg-12 col-xl-6">
                    <x-member :member="$member"/>
                </div>
            @endforeach
        </div>
    </div>
</div>

@stop