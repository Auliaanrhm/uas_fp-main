<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom sticky-top">
    <div class="container py-2">
        <a class="navbar-brand" href="{{ route('home') }}">Elegance Wardrobe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('job') }}">Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tracking') }}">Tracking</a>
                </li>
            </ul>
            @if (Route::has('login'))
                @if (auth()->check())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa-solid fa-user"></i>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark mx-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="btn btn-dark mx-2" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark mx-2" href="{{ route('register') }}">
                                Sign Up
                            </a>
                        </li>
                    </ul>
                @endif
            @endif
        </div>
    </div>
</nav>
