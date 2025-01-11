<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\AccessLog;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter users who are not admins
        $query->where('type', 0);

        // If search query exists, apply filter
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('member', function ($query) use ($search) {
                        $query->where('member_code', 'like', "%{$search}%");
                    });
            });
        }

        // Eager load the member relationship to avoid N+1 problem
        $users = $query->with('member')->get();

        return view('admin.memberships.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('admin.memberships.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);
    
        // Handle File Upload
        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        // Create Member
        $user = User::find($id);
        $member_code = 'MEM-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
        $user->member()->create([
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'profile_photo' => $profilePhotoPath,
            'member_code' => $member_code,
        ]);
    
        return redirect()->route('admin.memberships.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $accesslog = AccessLog::where('member_id', $user->member->id)->where('status', 'ongoing')->first();
        return view('admin.memberships.show', compact('user','accesslog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.memberships.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);


        $user = User::find($id);
        // Handle File Upload
        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            // If the user is uploading a new profile photo, we should delete the old one
            $existingMember = $user->member;  // Assuming the member relationship is already loaded
            if ($existingMember && $existingMember->profile_photo) {
                // Delete the old profile photo from the storage
                Storage::disk('public')->delete($existingMember->profile_photo);
            }
            // Store the new profile photo
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        
        // Update Member
        
        $member = $user->member; // Assuming user has a 'member' relationship

        // If the member doesn't exist, redirect with an error message
        if (!$member) {
            return redirect()->route('admin.memberships.index')->with('error', 'Member not found.');
        }

        // Update the member details
        $member->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'profile_photo' => $profilePhotoPath ?? $member->profile_photo, // Only update photo if new one is uploaded
        ]);

        return redirect()->route('admin.memberships.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkinGym(Request $request, $id)
    {
        $member = Member::find($id);
        
        // Create a new access log for check-in
        $accesslog = new AccessLog();
        $accesslog->member_id = $member->id;
        $accesslog->check_in_time = now();
        $accesslog->status = 'ongoing';
        $accesslog->save();

        return redirect()->route('admin.memberships.show', $member->user->id)->with('success', 'Gym Check-in successfully completed.');
    }

    public function checkoutGym(Request $request, $id)
    {
        $member = Member::find($id);

        // Find the corresponding access log
        $accesslog = AccessLog::where('member_id', $member->id)->first();
        if ($accesslog) {
            $accesslog->check_out_time = now();
            $accesslog->duration = now()->diffInMinutes($accesslog->check_in_time);
            $accesslog->status = 'completed';
            $accesslog->update();
        }

        return redirect()->route('admin.memberships.show', $member->user->id)->with('success', 'Gym Check-out successfully completed.');
    }
}
