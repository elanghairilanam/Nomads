@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header">
    </section>

    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Paket Travel</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p>{{ $item->location }}</p>

                        @if ($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom"
                                id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                    <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                    width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($item->galleries as $gallery)
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ Storage::url($gallery->image) }}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div> --}}

                        <div>
                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $item->about !!}
                            </p>
                        </div>

                        <div class="features row">
                            <div class="col-md-4">
                                <img src="{{ url('frontend/images/tiket.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Fetured Event</h3>
                                    <p>{{ $item->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('frontend/images/bahasa.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $item->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('frontend/images/makanan.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Food</h3>
                                    <p>{{ $item->foods }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2 mr-1">
                            <img src="{{ url('frontend/images/member1.png') }}" class="member-image">
                            <img src="{{ url('frontend/images/member2.png') }}" class="member-image">
                            <img src="{{ url('frontend/images/member3.png') }}" class="member-image">
                            <img src="{{ url('frontend/images/member4.png') }}" class="member-image">
                            <img src="{{ url('frontend/images/member5.png') }}" class="member-image">
                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">
                                    {{ \Carbon\Carbon::create($item->departure_date)->format('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">
                                    {{ $item->duration }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">
                                    {{ $item->type }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    ${{ $item->price }},00/ person
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                        <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                Join Now
                            </button>
                        </form>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                            Login or Register to Join
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-scrypt')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                xoffset: 15
            })
        })
    </script>
@endpush
