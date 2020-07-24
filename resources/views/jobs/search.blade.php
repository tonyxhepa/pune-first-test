@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        @foreach($jobs as $job)
            <h1><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a> </h1>
        @endforeach
    </div>
