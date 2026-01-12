<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $data = TransactionDetail::with(['product', 'transaction'])->get();

        return response()->json([
            'message' => 'Semua data transaction detail',
            'data' => $data
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id'     => 'required|exists:products,id',
            'qty'            => 'required|integer|min:1',
            'price'          => 'required|numeric|min:0'
        ]);

        // pastikan transaksi milik user
        $transaction = Transaction::where('id', $request->transaction_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaksi tidak valid'
            ], 403);
        }

        $detail = TransactionDetail::create([
            'transaction_id' => $request->transaction_id,
            'product_id'     => $request->product_id,
            'qty'            => $request->qty,
            'price'          => $request->price,
            'user_id'        => Auth::id() // 🔥 INI KUNCI
        ]);

        return response()->json([
            'message' => 'Transaction detail berhasil dibuat',
            'data' => $detail
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $detail = TransactionDetail::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$detail) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'qty'   => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $detail->update([
            'qty' => $request->qty,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $detail
        ]);
    }

    public function destroy($id)
    {
        $detail = TransactionDetail::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$detail) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $detail->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
