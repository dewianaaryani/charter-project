<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MembershipTransaction;
use App\Models\User;

class MembershipTransactionController extends Controller
{
    public function create($id)
    {
        $user = User::find($id);
        return view('admin.membershiptransactions.create', compact('user'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'membership_type' => 'required|string|max:255',
            'transaction_type' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        $member = Member::find($user->member->id);
        $member->membership_type = $request->membership_type;
        $member->start_date = now();
        if ($request->membership_type == 'monthly') {
            $member->end_date = now()->addMonth();
        }elseif ($request->membership_type == 'yearly') {
            $member->end_date = now()->addYear();
        }else {
            $member->end_date = now()->addDay();
        }
        $member->status = 'active';
        $member->save();

        $transaction = new MembershipTransaction();
        $transaction->payment_method = $request->payment_method;
        if($member->membership_type == 'monthly') {
            $transaction->amount = 300000;
        } elseif ($member->membership_type == 'yearly') {
            $transaction->amount = 3000000;
        } else {
            $transaction->amount = 100000;
        }
        $transaction->transaction_type = $request->transaction_type;
        $transaction->member_id = $member->id;
        $transaction->save();

        return redirect()->route('admin.memberships.index')->with('success', 'Transaction created successfully.');
    }
    public function show($id)
    {
        $membershipTransaction = MembershipTransaction::find($id);
        return view('admin.membershiptransactions.show', compact('membershipTransaction'));
    }
}
