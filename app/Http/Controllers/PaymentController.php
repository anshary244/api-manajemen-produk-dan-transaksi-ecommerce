<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string'
        ]);

        $payment = Payment::create($request->all());

        return response()->json([
            'message' => 'Payment berhasil dibuat',
            'data' => $payment
        ], 201);
    }


    public function show($id)
    {
        return response()->json(Payment::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return response()->json(['message' => 'Payment deleted']);
    }
}
