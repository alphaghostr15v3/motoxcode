<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'members' => \App\Models\Member::count(),
            'upcoming_events' => \App\Models\Event::where('status', 'upcoming')->count(),
            'blogs' => \App\Models\Blog::count(),
            'gallery' => \App\Models\GalleryImage::count(),
            'messages' => \App\Models\Message::where('is_read', false)->count(),
            'urgent_messages' => \App\Models\Message::where('is_read', false)
                                ->where(function($q) {
                                    $q->where('subject', 'like', '%urgent%')
                                      ->orWhere('message', 'like', '%urgent%');
                                })->count(),
        ];

        $recentMembers = \App\Models\Member::latest()->take(5)->get();
        $upcomingEvents = \App\Models\Event::where('status', 'upcoming')
                            ->orderBy('date', 'asc')
                            ->take(3)
                            ->get();
        $recentBlogs = \App\Models\Blog::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMembers', 'upcomingEvents', 'recentBlogs'));
    }



    public function settings()
    {
        $settings = \App\Models\Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }



}
