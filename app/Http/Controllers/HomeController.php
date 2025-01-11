<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');

    } 
    public function memberships()
    {
        // Check if the user is authenticated and has a member relationship
        $member = Auth::check() ? Auth::user()->member : null;

        // Pass $member to the view
        return view('memberships', compact('member'));
    }
    public function registermemberships($id)
    {
        $user = User::find($id);
        return view('registermemberships', compact('user'));
    }
    public function postregistermemberships(Request $request, $id)
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
    
        return redirect()->route('memberships')->with('success', 'Member created successfully.');
    }
  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()

    {

        return view('admin.index');

    }

  
}
