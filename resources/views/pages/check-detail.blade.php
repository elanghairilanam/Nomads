@extends('layouts.success')

@section('title', 'Checkout')

@section('content')
<main>
    <div class="position-relative container-sm">
        <h1 class="text-center my-5">Detail Information</h1>
        <div class="row justify-content-center">
            <div class="card my-3 px-3">
                <h1 style="font-size: 20px; font-weight: bold" class="border-bottom mt-3">Trip Informations</h1>
                <table class="trip-information">
                    <tr>
                        <th width="50%">Date of Departure</th>
                        <td width="50%" class="text-right">
                            {{ \Carbon\Carbon::create($item->travel_package->departure_date)->format('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Duration</th>
                        <td width="50%" class="text-right">
                            {{ $item->travel_package->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Type</th>
                        <td width="50%" class="text-right">
                            {{ $item->travel_package->type }}
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Price</th>
                        <td width="50%" class="text-right">
                            ${{ $item->travel_package->price }},00/ person
                        </td>
                    </tr>
                </table>

                <h1 style="font-size: 20px; font-weight: bold" class="border-bottom mt-3">Checkout Informations</h1>
                <table class="checkout-informations">
                    <tr>
                        <th width="50%">Members</th>
                        <td width="50%" class="text-right">
                            {{ $item->details->count() }} person
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Additional VISA</th>
                        <td width="50%" class="text-right">
                            $ {{ $item->additional_visa}},00
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Trip Price</th>
                        <td width="50%" class="text-right">
                            $ {{ $item->travel_package->price }},00 / person
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Sub Total</th>
                        <td width="50%" class="text-right">
                            $ {{ $item->transaction_total }},00
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Total (+Unique Code)</th>
                        <td width="50%" class="text-right text-total">
                            <span class="text-blue">${{ $item->transaction_total }},</span>
                            <span class="text-orange">
                                {{ mt_rand(0,99) }}
                            </span>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>


</main>
@endsection
