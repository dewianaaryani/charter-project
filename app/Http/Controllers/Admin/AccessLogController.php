<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccessLog;
class AccessLogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $accessLogs = AccessLog::with('member.user')
            ->when($search, function ($query, $search) {
                $query->whereHas('member.user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return view('admin.access_log.index', compact('accessLogs', 'search'));
    }
}
