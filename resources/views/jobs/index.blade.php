@extends('layout')

@section('title')
Home page
@endsection

@section('content')
    <div class="mt-4">
        <form action="/something" class="w-100 d-flex flex-direction-column">
            <input type="text" class="form-control" placeholder="Search for a job now">
            <button class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection