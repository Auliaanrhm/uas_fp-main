@extends('layouts.app')

@section('content')
    <div class="container py-2">
        <h1 class="text-center mb-4">Apply for {{ $job->position }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $job->position }}</h5>
                        <p class="card-text">Jobdesc : {{ $job->description }}</p>
                        <hr>
                        <h5 class="mb-4">Application Form</h5>
                        <form method="POST" action="{{ route('recruitments.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Your Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Resume (pdf / doc / docx)</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" required>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark w-100">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
