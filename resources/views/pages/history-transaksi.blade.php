@extends('layouts.app')
@section('content')

<main>
    <div class="container d-flex align-items-center">
        <div class="card">
            <div class="col text-left">
                <h1>Riwayat Pembelian</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Acara</th>
                            <th scope="col">Berangkat</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">Type</th>
                            <th scope="col">Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $row => $items)
                        <tr>
                            <th scope="row">{{ $row+1 }}</th>
                            <td><a href="">{{ $items->travel_package->title }}</a></td>
                            <td>{{ $items->travel_package->location }}</td>
                            <td>{{ $items->travel_package->featured_event }}</td>
                            <td>{{ $items->travel_package->departure_date }}</td>
                            <td>{{ $items->travel_package->duration }}</td>
                            <td>{{ $items->travel_package->type }}</td>
                            <td>${{ $items->travel_package->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
