<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\SalesTransaction;
use App\Models\Member;
use Carbon\Carbon;

class SalesTransactionController extends Controller
{
    // public function create($id)
    // {
    //     $inventories = Inventory::where('status', '!=', 'out_of_stock')->get();
    //     $user = User::find($id);
    //     return view('admin.salestransactions.create', compact('user', 'inventories'));
    // }
    public function store(Request $request, $id)
    {
        $member = Member::find($id);
        $salesTransaction = SalesTransaction::create([
            'member_id' => $member->id,
            'transaction_date' => Carbon::now(),
            'status' => 'pending',
        ]);
        return redirect()->route('admin.salestransactions.show', $salesTransaction->id)->with('success', 'Sales Transaction Added Successfully.');
    }
    public function show($id)
    {
        $salesTransaction = SalesTransaction::find($id);
        $inventories = Inventory::where('status', '!=', 'out_of_stock')->get();
        return view('admin.salestransactions.show', compact('salesTransaction', 'inventories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string|max:20',
        ]);
        $salesTransaction = SalesTransaction::find($id);
        $salesTransaction->payment_method = $request->payment_method;
        $salesTransaction->status = "completed";
        $salesTransaction->total_amount = $salesTransaction->details->sum('subtotal');
        $salesTransaction->save();
        return redirect()->route('admin.salestransactions.show', $salesTransaction->id)->with('success', 'Sales Transaction Updated Successfully.');
    }
}
