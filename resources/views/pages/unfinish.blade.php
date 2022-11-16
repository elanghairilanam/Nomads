@extends('layouts.success')

@section('title', 'Success Checkout')

@section('content')
<main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                {{-- <img src="{{ url('frontend/images/299045_sign_error_icon.png') }}" alt=""> --}}
                <h1>Oopss!</h1>
                <p>your transaction is unfinished.</p>

                <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">
                    Home
                </a>
            </div>
        </div>
    </main>
@endsection
