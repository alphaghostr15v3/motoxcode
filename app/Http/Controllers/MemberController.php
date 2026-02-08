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
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'role' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['photo'] = 'uploads/' . $filename;
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
            'name' => 'required',
            'email' => 'required|email|unique:members,email,'.$id,
            'role' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = \App\Models\Member::findOrFail($id);
        
        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            // Delete old file
            if ($member->photo && file_exists(public_path($member->photo))) {
                unlink(public_path($member->photo));
            }
            
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['photo'] = 'uploads/' . $filename;
        }

        $member->update($data);

        return redirect()->route('admin.members')->with('success', 'Member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = \App\Models\Member::findOrFail($id);
        
        // Delete physical file
        if ($member->photo && file_exists(public_path($member->photo))) {
            unlink(public_path($member->photo));
        }
        
        $member->delete();

        return redirect()->route('admin.members')->with('success', 'Member deleted successfully.');
    }
}
