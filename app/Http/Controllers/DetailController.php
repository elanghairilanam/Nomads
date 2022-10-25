<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = TravelPackage::with(['galleries'])
                ->where('slug',$slug)
                ->firstOrFail();
        // dd($item);
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
