@extends('layouts.admin')

@section('title', 'Admin - Recruitments')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
        </div>
        <hr>
        <form action="{{ route('admin.recruitments.update', ['recruitment' => $recruitment->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        id="name" value="{{ $errors->any() ? old('name') : $recruitment->name }}"
                        placeholder="Enter Product Name" readonly>
                    @error('name')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input class="form-control @error('position') is-invalid @enderror" type="text" name="position"
                        id="position" value="{{ $errors->any() ? old('position') : $recruitment->job->position }}"
                        placeholder="Enter Position" readonly>
                    @error('position')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address"
                        value="" placeholder="Enter Address" readonly>{{ old('address', $recruitment->address) }}</textarea>
                    @error('address')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                        id="email" value="{{ old('email', $recruitment->email) }}" placeholder="Enter Email" readonly>
                    @error('email')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="file" class="form-label">Resume</label>
                    @if ($recruitment->file)
                        <div class="mb-2">
                            <a href="/storage/recruitments/{{ $recruitment->file }}" class="btn btn-outline-dark">
                                <i class="fas fa-download me-2"></i> Download</a>
                        </div>
                    @else
                        <p class="text-muted">No Resume uploaded</p>
                    @endif
                    @error('file')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="Review Berkas Oleh HRD"
                            {{ $recruitment->status == 'Review Berkas Oleh HRD' ? 'selected' : '' }}>
                            Review Berkas Oleh HRD
                        </option>
                        <option value="Psikotes" {{ $recruitment->status == 'Psikotes' ? 'selected' : '' }}>
                            Psikotes
                        </option>
                        <option value="Wawancara Tahap 1 : HRD"
                            {{ $recruitment->status == 'Wawancara Tahap 1 : HRD' ? 'selected' : '' }}>
                            Wawancara Tahap 1 : HRD
                        </option>
                        <option value="Wawancara Tahap 2 : User"
                            {{ $recruitment->status == 'Wawancara Tahap 2 : User' ? 'selected' : '' }}>
                            Wawancara Tahap 2 : User
                        </option>
                        <option value="Negoisasi Gaji" {{ $recruitment->status == 'Negoisasi Gaji' ? 'selected' : '' }}>
                            Negoisasi Gaji
                        </option>
                        <option value="Offering Letter" {{ $recruitment->status == 'Offering Letter' ? 'selected' : '' }}>
                            Offering Letter
                        </option>
                        <option value="Diterima" {{ $recruitment->status == 'Diterima' ? 'selected' : '' }}>
                            Diterima
                        </option>
                        <option value="Ditolak" {{ $recruitment->status == 'Ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                    </select>
                    @error('status')
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
