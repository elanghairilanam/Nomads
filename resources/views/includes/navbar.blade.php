<!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ url('frontend/images/logo_nomads.png') }}" alt="Logo NOMADS">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navb"
                aria-controls="navb" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('home') }}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="" class="nav-link">Paket Travel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="" class="nav-link">Testimonial</a>
                    </li>
                </ul>

                @auth
                <form class="form-inline d-sm-block d-md-none" action="{{ route('logout') }}"
                method="POST">
                @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                    Logout
                    </button>
                </form>

                <!-- desktop -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}"
                method="POST">
                @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                    Logout
                    </button>
                </form>
                @endauth

                @guest

                <!-- mobile button -->

                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                    Login
                    </button>
                </form>

                <!-- desktop -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                    Login
                    </button>
                </form>
                @endguest

            </div>
        </nav>
    </div>
