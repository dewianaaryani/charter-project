<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipTransaction;
use App\Models\SalesTransaction;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Filter Membership Transactions
        $membershipTransactions = MembershipTransaction::query()
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->with('member.user')
            ->get();

        // Total Amount for Membership Transactions
        $totalMembershipAmount = $membershipTransactions->sum('amount');

        // Filter Sales Transactions
        $salesTransactions = SalesTransaction::query()
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->with('member.user')
            ->get();

        // Total Amount for Sales Transactions
        $totalSalesAmount = $salesTransactions->sum('total_amount');

        return view('admin.reports.index', compact(
            'membershipTransactions', 
            'salesTransactions', 
            'totalMembershipAmount', 
            'totalSalesAmount'
        ));
    }
}
