<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    public function onPending(Request $request)
    {
        try {
            Transaction::create([
                'user_id' => Auth::user()->id,
                'order_id' =>   $request->order_id,
                'products' => $request->products,
                'total' => $request->total,
                'status' => $request->status,
                'snap_token' => $request->snap_token,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function onSuccess(Request $request)
    {
        try {
            $existingTransaction = Transaction::where('order_id', $request->order_id)->first();

            if ($existingTransaction) {
                $existingTransaction->update([
                    'status' => $request->status
                ]);
            } else {
                Transaction::create([
                    'user_id' => Auth::user()->id,
                    'order_id' =>   $request->order_id,
                    'products' => $request->products,
                    'total' => $request->total,
                    'status' => $request->status,
                    'snap_token' => $request->snap_token,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}