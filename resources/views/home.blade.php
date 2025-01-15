@extends('layouts.app')

@section('title', 'BoF Careers')

@section('content')
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4">BoF Careers</h1>
                <p class="lead">Temukan Karir Impianmu di Dunia Fashion melalu Platform yang menyediakan peluang terbaik!</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ Vite::asset('resources/images/dress_1.png') }}" alt="BoF Careers"
                    class="img-fluid rounded float-end">
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center position-relative">
                        <img src="{{ Vite::asset('resources/images/about_us.png') }}" alt="About Us"
                            class="img-fluid rounded shadow float-start img-about-us">
                    </div>
                    <div class="col-md-6 ps-4 position-relative">
                        <div class="card about-us-card">
                            <div class="card-body">
                                <h2 class="card-title">About Us</h2>
                                <p class="lead text-justify">
                                    Di BoF Careers, kami percaya pada pentingnya memberdayakan setiap individu untuk
                                    mengekspresikan
                                    gaya unik mereka melalui fashion. Koleksi kami dipilih dengan cermat untuk memastikan
                                    kualitas terbaik
                                    dan tren terkini.
                                </p>
                                <p class="text-justify">
                                    Mulai dari pakaian kasual hingga busana formal, kami menyediakan sesuatu untuk semua
                                    orang. Bergabunglah
                                    dengan kami dalam perjalanan untuk mendefinisikan ulang keanggunan dan gaya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container my-5">
                    <div class="text-center">
                        <h2>Contact Us</h2>
                        <p class="lead">Kami suka mendengar saran dari anda! Beri kami masukan melalui kontak berikut
                        </p>
                        <div class="mb-2 card shadow p-1">
                            <div>Email</div>
                            <div>support@BoFCareers.com</div>
                        </div>
                        <div class="mb-2 card shadow p-1">
                            <div>Phone</div>
                            <div>+123 456 7890</div>
                        </div>
                        <div class="mb-2 card shadow p-1">
                            <div>Address</div>
                            <div>123 Fashion Street, Surabaya, Indonesia</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
