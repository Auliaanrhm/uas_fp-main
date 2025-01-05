@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 bg-dark rounded-1 p-4">
                <div class="card-header text-start text-white">
                    <h4 class="mt-2 fw-bold">{{ __('Login') }}</h4>
                </div>
                <div class="card-body p-3 bg-dark text-white">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control bg-dark rounded-0 border-0 border-bottom text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" autofocus placeholder="Enter your email address">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control bg-dark rounded-0 border-0 border-bottom text-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-light w-100 py-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
