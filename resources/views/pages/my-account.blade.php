@extends('layouts.app')
@section('content')

<main>
    <div class="container d-flex align-items-center content" style="margin-top: -66px">
        <div class="card card-myacount" style="margin-top: 80px">
            <div class="col text-left">
                <h1>Detail Akun</h1>
                <form>
                    <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="Email" value="{{ $item->name }}">
                            </div>

                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="Email" value="{{ $item->email }}">
                            </div>

                        <label for="Email" class="col-sm-2 col-form-label">username</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="Email" value="{{ $item->username }}">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
