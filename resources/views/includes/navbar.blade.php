<!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ url('frontend/images/logo_nomads.png') }}" alt="Logo NOMADS">
            </a>

            <button class="navbar-toggler" style="z-index: 1000" type="button" data-bs-toggle="collapse" data-bs-target="#navb"
                aria-controls="navb" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('home') }}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#travel" class="nav-link">Paket Travel</a>
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
                        <a href="#testimonialHeading" class="nav-link">Testimonial</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name }}
                            </span> --}}
                            <img class="img-profile rounded-circle"
                            src="{{ url('backend/img/undraw_profile.svg') }}">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('myaccount') }}">Akun Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('historytransactions') }}">Transaksi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                    {{-- <div class="btn-group">
                         <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                         </button>
                    <div class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </div>
                    </div> --}}
                    @endauth
                </ul>

                {{-- @auth
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
                @endauth --}}

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
