<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
 
    // GET TRANSAKSI USER LOGIN
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();

        return response()->json($transactions, 200);
    }

    // CREATE TRANSAKSI
    public function store(Request $request)
    {
        $request->validate([
            'total_price' => 'required|numeric|min:1'
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction
        ], 201);

    }

    // DETAIL TRANSAKSI USER
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        return response()->json($transaction, 200);
    }

 
    // UPDATE STATUS TRANSAKSI

   public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'status' => 'required|string|in:pending,success,cancel',
        'total_price' => 'required|numeric|min:0',
    ]);

    // Cari transaksi
    $transaction = Transaction::findOrFail($id);

    // Update data
    $transaction->update([
        'status' => $validated['status'],
        'total_price' => $validated['total_price'],
    ]);

    return response()->json([
        'message' => 'Transaction updated successfully',
        'data' => $transaction
    ], 200);
}

    // DELETE TRANSAKSI USER
    public function destroy($id)
{
    $transaction = Transaction::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();

    if (!$transaction) {
        return response()->json([
            'message' => 'Transaksi tidak ditemukan atau bukan milik Anda'
        ], 404);
    }

    $transaction->delete();

    return response()->json([
        'message' => 'Transaksi berhasil dihapus'
    ], 200);
}
}