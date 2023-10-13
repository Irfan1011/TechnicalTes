<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('Cart/buy');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $total = $request->price;

        Trasaction::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'transaction_date' => now(),
            'total' => $total,
            'status' => true,
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
