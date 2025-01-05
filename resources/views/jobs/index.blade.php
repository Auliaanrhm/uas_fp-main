@extends('layouts.app')

@section('title', 'Job in Elegance Wardrobe')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-5">Job Available</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($jobs as $job)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($job->image)
                            <img src="{{ asset('storage/jobs/' . $job->image) }}" class="card-img-top img-thumbnail"
                                alt="Job Image">
                        @else
                            <div class="text-center py-5">
                                <i>No Image</i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $job->position }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($job->description, 100) }}</p>
                            <a href="{{ route('apply', ['id' => $job->id]) }}" class="btn btn-primary mt-auto">Apply</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
