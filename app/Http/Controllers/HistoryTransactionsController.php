<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryTransactionsController extends Controller
{
    public function index()
    {
        $item = Transaction::with(['travel_package', 'user'])->where('user_id', Auth::user()->id)->where('transaction_status', 'SUCCESS')->get();
        // dd($item);
        return view('pages.history-transaksi', [
            'item' => $item
        ]);
    }
}
