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
                    <option value="none" selected>None</option>
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
                <div class="card job mb-3" data-id="{{ $job->id }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <h6 class="card-subtitle text-muted">{{ $job->job_type }}</h6>
                        <p class="card-text">{{ Str::limit($job->description, 120, '(...)') }}</p>
                    </div>
                </div>
            @empty
                <h1 class="display-6 text-danger">
                    No jobs found.
                </h1>
            @endforelse

            <nav class="mt-3">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    @for($i = 0; $i < $pages_count; $i++)
                        <li class="page-item"><a href='{{ url("/jobs?q=$query&p=").$i }}' class="page-link">{{ $i + 1  }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

        <div class="col-lg-8 mt-4">
            <!-- Job Info -->
            @php
                if(isset($j)) {
                    $selected = $jobs->firstWhere('id', $j);
                }
            @endphp

            @if(isset($selected))
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{ $selected->title }}</div>
                        <h6 class="card-subtitle text-muted">{{ $selected->job_type }}</h6>
                        <p class="card-text">{{ $selected->description }}</p>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var jobs = document.querySelectorAll('.job').forEach(function (el) {
            el.addEventListener('click', function() {
                window.location.assign(`{{ url("/jobs?q=$query") }}&j=${el.getAttribute('data-id')}&p={{ $current_page }}`);
            });
        });
    </script>
@endsection