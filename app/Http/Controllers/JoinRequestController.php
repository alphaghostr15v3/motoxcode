<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\JoinRequest::latest()->get();
        return view('admin.join_requests', compact('requests'));
    }

    public function destroy($id)
    {
        $request = \App\Models\JoinRequest::findOrFail($id);
        $request->delete();
        return redirect()->back()->with('success', 'Join request deleted successfully.');
    }
}
