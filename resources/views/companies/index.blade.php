@extends('layout')

@section('title')
Companies
@endsection

@section('content')
    <div class="row">
        <div class="mt-4">
            <h1 class="text-center">Popular Companies</h1>
            <div class="row mt-4">
                @foreach($companies as $company)
                    <div class="col-lg-4 my-2">
                        {{ $company->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection