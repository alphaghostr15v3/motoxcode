<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberDashboardController extends Controller
{
    public function dashboard()
    {
        $member = Auth::guard('members')->user();
        $upcomingEvents = \App\Models\Event::where('status', 'upcoming')
                            ->orderBy('date', 'asc')
                            ->take(5)
                            ->get();
        
        return view('member.dashboard', compact('member', 'upcomingEvents'));
    }

    public function profile()
    {
        $member = Auth::guard('members')->user();
        return view('member.profile', compact('member'));
    }

    public function updateProfile(Request $request)
    {
        $member = Auth::guard('members')->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email,' . $member->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'bio']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // Delete old file
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }
            
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        $member->update($data);

        return redirect()->route('member.profile')->with('success', 'Profile updated successfully.');
    }
}
