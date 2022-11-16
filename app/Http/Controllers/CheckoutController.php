<?php

namespace App\Http\Controllers;

use App\Mail\TransactionSuccess;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Carbon\carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details','travel_package','user'])->findOrFail($id);
        // dd($item->travel_package->slug);
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);
        // dd($travel_package);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'user_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYear(5)
        ]);



        return redirect()->route('checkout',$transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details','travel_package'])
            ->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 50;
            $transaction->additional_visa -= 50;
        }

        $check = TransactionDetail::where('transactions_id',$transaction->id)->get();

        // dd(count($check));

        if (count($check) > 1) {
            $transaction->transaction_total -= $transaction->travel_package->price;
        } else {
            $transaction->transaction_total = 0;
        }


        $transaction->save();

        $item->delete();

        return redirect()->route('checkout',$transaction->id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        // dd($request->is_visa);

        if($request->is_visa){
            // dd('a');
            $transaction->transaction_total += 50;
            $transaction->additional_visa += 50;
        }


        $transaction->transaction_total += $transaction->travel_package->price;
        // return $transaction;
        $transaction->save();

        return redirect()->route('checkout', $id);

    }

    public function success(Request $request, $id){
        $transaction = Transaction::with(['details','travel_package.galleries','user'])
        ->findOrFail($id);
        // dd($transaction->user);

        $transaction->transaction_status = 'PENDING';


        $transaction->save();

        //set config midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $enable_payments = array(
            "gopay",
            "permata_va",
            "bca_va",
            "bni_va",
            "other_va",
            "Indomaret"
        );
        $credit_card['secure'] = true;

        //kirim array ke midtrans
        $midtrans_param = [
            'transaction_details' => [
                'order_id' => 'Trans-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email
            ],
            'enabled_payments' => $enable_payments,
            'vtweb' => []
        ];

        try {
            //ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_param)->redirect_url;
            // dd($paymentUrl);
            //redirect ke halaman midtrans
            return redirect($paymentUrl);
            // header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMassage();
        }

        //kirim email ke user
        // Mail::to($transaction->user->email)->send(
        //     new TransactionSuccess($transaction)
        // );


        // return view('pages.success');
    }

    public function detail(Request $request, $id){
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        // dd($item->travel_package->galleries[0]->image);

        return view('pages.check-detail', [
            'item' => $item
        ]);
    }
}
