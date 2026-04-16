<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
class PurchaseController extends Controller
{
    public function store(Request $request){
        $purchase = Purchase::create([
            'user_id'=> $request->user()->id,
            'products' => $request->products,
            'total' => $request->total,
        ]);
        return $purchase;
    }

    public function index(Request $request){
        return Purchase::where('user_id', $request->user()->id)->get();
    }
}
