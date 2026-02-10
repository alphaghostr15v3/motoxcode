<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = \App\Models\Member::latest()->get();
        return view('admin.members', compact('members'));
    }

    public function create()
    {
        return view('admin.members_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'role' => 'required|string|in:Member,President,Vice President,Secretary',
            'password' => 'required|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);
        
        $data = $request->except(['_token', 'photo']);
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        $data['social_links'] = json_encode([]);
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        \App\Models\Member::create($data);

        return redirect()->route('admin.members')->with('success', 'Member created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $member = \App\Models\Member::findOrFail($id);
        return view('admin.members_form', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,'.$id,
            'role' => 'required|string|in:Member,President,Vice President,Secretary',
            'password' => 'nullable|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);
        
        $member = \App\Models\Member::findOrFail($id);
        $data = $request->except(['_token', 'photo', 'password']);
        
        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
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

        return redirect()->route('admin.members')->with('success', 'Member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = \App\Models\Member::findOrFail($id);
        
        // Delete physical file
        if ($member->image && file_exists(public_path($member->image))) {
            unlink(public_path($member->image));
        }
        
        $member->delete();

        return redirect()->route('admin.members')->with('success', 'Member deleted successfully.');
    }
}
