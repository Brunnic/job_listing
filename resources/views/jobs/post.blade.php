@extends('layout')

@section('title')
    Post a new job
@endsection

@section('content')
    <div class="row">
        <h1 class="p-4 bg-light mt-4 text-center">Post a new job</h1>

        <div class="mt-4 p-4 bg-light">
            <form action="{{ url('/jobs/new') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company name</label>
                    <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company name">
                </div>
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Job title</label>
                    <input type="text" class="form-control" name="jobTitle" id="jobTitle" placeholder="Job title">
                </div>
                <div class="mb-3">
                    <label for="jobDescription" class="form-label">Description</label>
                    <textarea rows="4" class="form-control" name="jobDescription" id="jobDescription" placeholder="Description" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="job_type" class="form-label">Job type</label>
                    <select name="job_type" id="job_type" class="form-select">
                        <option value="Full Time">Full Time</option>
                        <option value="Full Time">Part Time</option>
                        <option value="Full Time">Permanent</option>
                        <option value="Full Time">Contract</option>
                        <option value="Full Time">Temporary</option>
                    </select>
                </div>
                <div class="mb-3 text-center">
                    <input type="submit" class="btn btn-primary" value="Post">
                </div>
            </form>
        </div>
    </div>
@endsection