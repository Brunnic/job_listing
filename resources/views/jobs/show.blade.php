@extends('layout')

@section('title')
{{ $job->title }}
@endsection

@section('content')
    <div class="row mt-4">
        <h1>{{ $job->title }}</h1>
        <h4 class="text-muted">{{ $job->job_type }}</h4>
        <p class="mt-3">
            {{ $job->description }}
        </p>
    </div>
@endsection