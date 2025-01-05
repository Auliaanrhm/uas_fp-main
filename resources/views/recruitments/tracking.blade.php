@extends('layouts.app')

@section('title', 'Tracking')

@section('content')
    <div class="container my-2">
        <h1 class="mb-4">Your Applications</h1>
        @if ($recruitments->isEmpty())
            <p>You have no application yet.</p>
        @else
            <div class="row">
                @foreach ($recruitments as $recruitment)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col h5 fw-bold">{{ $recruitment->job->position ?? 'No Job Assigned' }}</div>
                                    <div class="col ms-auto text-end">{{ $recruitment->created_at }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="card-title">{{ $recruitment->name }} - {{ $recruitment->email }}</div>
                                        <p class="card-text">Address : {{ $recruitment->address }}</p>
                                    </div>
                                    <div class="col ms-auto text-end">
                                        <a href="{{ asset('storage/recruitments/' . $recruitment->file) }}"
                                            class="btn btn-outline-dark">
                                            <i class="fas fa-download"></i> Download Resume
                                        </a>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <span
                                        class="badge p-2 fs-5 w-100
                                        @if ($recruitment->status == 'Diterima') text-bg-success 
                                        @elseif($recruitment->status == 'Ditolak') text-bg-danger 
                                        @else text-bg-primary @endif">
                                        Status : {{ $recruitment->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
