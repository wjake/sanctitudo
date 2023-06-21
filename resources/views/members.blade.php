@extends('layouts.index')

@section('content')

@foreach ($company->members as $member)
    <x-member :member="$member"/>
@endforeach

@stop