@extends('layout')

@section('title')
"{{ $query }}" Jobs - Search
@endsection

@section('content')
    <div class="mt-4 row">
        <div>
            <div class="mt-2 d-flex flex-direction-column">
                <input type="text" class="form-control" placeholder="Search Job" name="search" id="search" value="{{ $query }}">
                <button class="btn btn-primary search-btn">Find jobs</button>
            </div>

            <div class="mt-4 d-flex flex-direction-column">
                <select name="job_type" id="job_type" class="form-select">
                    <option value="Full Time">Full Time</option>
                    <option value="Full Time">Part Time</option>
                    <option value="Full Time">Permanent</option>
                    <option value="Full Time">Contract</option>
                    <option value="Full Time">Temporary</option>
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Results -->
            <h1 class="display-4">Found Jobs:</h1>
            @forelse($jobs as $job)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <h6 class="card-subtitle text-muted">{{ $job->job_type }}</h6>
                        <p class="card-text">{{ $job->description }}</p>
                    </div>
                </div>
            @empty
                <h1 class="display-6 text-danger">
                    No jobs found.
                </h1>
            @endforelse
        </div>

        <div class="col-lg-8">
            <!-- Job Info -->
        </div>
    </div>
@endsection