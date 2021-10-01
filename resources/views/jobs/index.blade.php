@extends('layout')

@section('title')
Home page
@endsection

@section('content')
    <div class="my-4 d-flex flex-direction-column">
        <input type="text" class="form-control" placeholder="Search for a job now" name="search" id="search">
        <button class="btn btn-primary search-btn">Search</button>
    </div>

    <div class="searches mt-4 bg-light">
       <h1 class="display-5 text-center">
           Recent Searches
       </h1>
       <div class="d-flex flex-column align-items-center justify-content-center">
            @foreach($searches as $s)
                <div class="card">
                    {{ $s }}
                </div>
            @endforeach
       </div>
    </div>
@endsection
