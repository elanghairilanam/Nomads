<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function index(){
        $item = Auth::user();
        return view('pages.my-account', [
            'item' => $item
        ]);
    }
}
