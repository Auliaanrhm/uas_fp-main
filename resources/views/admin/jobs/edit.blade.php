@extends('layouts.admin')

@section('title', 'Admin - Jobs')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
        </div>
        <hr>

        <form action="{{ route('admin.jobs.update', ['job' => $job->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="position" class="form-label">Job Position</label>
                    <input class="form-control @error('position') is-invalid @enderror" type="text" name="position"
                        id="position" value="{{ $errors->any() ? old('position') : $job->position }}"
                        placeholder="Enter Position">
                    @error('position')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                        id="description" value="" placeholder="Enter Description" required>{{ old('description', $job->description) }}</textarea>
                    @error('description')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if ($job->image)
                        <div class="mb-2">
                            <img src="/storage/jobs/{{ $job->image }}" class="img-fluid img-thumbnail"
                                style="height:200px!important;"></img>
                        </div>
                    @else
                        <p class="text-muted">No Image uploaded</p>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        accept=".jpg,.jpeg,.png">
                    @error('image')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
            </div>

            <hr>
            <div class="row">
                <!-- Cancel Button -->
                <div class="col-md-6 d-grid">
                    <a href="{{ route('admin.recruitments.index') }}" class="btn btn-outline-danger btn-lg mt-3">
                        <i class="bi-arrow-left-circle me-2"></i> Cancel
                    </a>
                </div>

                <!-- Update Button -->
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-dark btn-lg mt-3 btn-pink">
                        <i class="bi-check-circle me-2"></i> Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
