@extends('layout')

@section('title')
Home page
@endsection

@section('content')
    <div class="my-4 d-flex flex-direction-column justify-content-between">
        <input type="text" class="form-control w-75" placeholder="Search for a job now" name="search" id="search">
        <button class="btn btn-primary search-btn">Search</button>
    </div>

    <div class="searches mt-4 bg-light">
       <h1 class="display-5 text-center">
           Recent Searches
       </h1>
       <div class="d-flex flex-column align-items-center justify-content-center">
            @if(isset($searches))
                @foreach($searches as $s)
                    <a href="{{ url('/jobs') }}?q={{ $s }}" class="card py-1 px-4 mb-3 w-50 text-center">
                        {{ $s }}
                    </a>
                @endforeach
            @endif
       </div>
    </div>
@endsection
