<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesTransaction;
use App\Models\TransactionDetail;
use App\Models\Inventory;

class TransactionDetailController extends Controller
{
    public function store( Request $request, $sale_id)
    {
        $sale = SalesTransaction::find($sale_id);
        $inventory = Inventory::find($request->inventory_id);
        $transactionDetail = new TransactionDetail();
        $transactionDetail->sale_id = $sale_id;
        $transactionDetail->inventory_id = $inventory->id;
        $transactionDetail->quantity = $request->quantity ?? 0;
        $transactionDetail->unit_price = $inventory->price;
        $transactionDetail->subtotal = $request->quantity * $inventory->price;
        $transactionDetail->save();
        $inventory->stock = $inventory->stock - $request->quantity;
        $inventory->save();
        return redirect()->route('admin.salestransactions.show', $sale->id)->with('success', 'Transaction Detail Added Successfully.');
    }
    public function destroy($detail_id){
        $transactionDetail = TransactionDetail::find($detail_id);
        $transactionDetail->delete();
        $inventory = Inventory::find($transactionDetail->inventory_id);
        $inventory->stock = $inventory->stock + $transactionDetail->quantity;
        $inventory->save();
        return redirect()->route('admin.salestransactions.show', $transactionDetail->sale_id)->with('success', 'Transaction Detail Deleted Successfully.');
    }
}
