<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = TravelPackage::with(['galleries'])->get();
        // dd($items);
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
