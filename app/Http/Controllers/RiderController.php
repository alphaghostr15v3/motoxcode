<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riders = \App\Models\Rider::orderBy('points', 'desc')->get();
        // Update ranks dynamically based on points
        $rank = 1;
        foreach ($riders as $rider) {
            $rider->update(['rank' => $rank++]);
        }
        
        return view('admin.leaderboard', compact('riders'));
    }

    public function create()
    {
        return view('admin.leaderboard_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['_token']);

        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['avatar'] = 'uploads/' . $filename;
        }

        \App\Models\Rider::create($data);

        return redirect()->route('admin.leaderboard')->with('success', 'Rider added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $rider = \App\Models\Rider::findOrFail($id);
        return view('admin.leaderboard_form', compact('rider'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rider = \App\Models\Rider::findOrFail($id);
        
        $data = $request->except(['_token']);

        if ($request->hasFile('avatar_file')) {
            // Delete old file
            if ($rider->avatar && file_exists(public_path($rider->avatar))) {
                unlink(public_path($rider->avatar));
            }
            
            $file = $request->file('avatar_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['avatar'] = 'uploads/' . $filename;
        }

        $rider->update($data);

        return redirect()->route('admin.leaderboard')->with('success', 'Rider updated successfully.');
    }

    public function destroy(string $id)
    {
        $rider = \App\Models\Rider::findOrFail($id);
        
        // Delete physical file
        if ($rider->avatar && file_exists(public_path($rider->avatar))) {
            unlink(public_path($rider->avatar));
        }
        
        $rider->delete();

        return redirect()->route('admin.leaderboard')->with('success', 'Rider deleted successfully.');
    }
}
