@extends('layouts.admin')

@section('title', 'Admin - Jobs')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEmployee">
                        <i class="bi bi-plus-circle me-1"></i>
                        Add Job
                    </button>
                </ul>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="jobTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No.</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade" id="createEmployee" tabindex="-1" arialabelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Add Job
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="position" class="form-label">Name</label>
                            <input class="form-control @error('position') is-invalid @enderror" type="text" name="position"
                                id="position" value="{{ old('position') }}" placeholder="Enter Position">
                            @error('position')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description (Jobdesc / Requirement)</label>
                            <textarea class="form-control" type="text" name="description" id="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">
                                Image (optional)
                            </label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
