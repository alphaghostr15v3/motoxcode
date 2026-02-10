<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = \App\Models\Event::latest()->get();
        return view('admin.events', compact('events'));
    }

    public function create()
    {
        return view('admin.events_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:upcoming,completed,cancelled',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['_token']);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        \App\Models\Event::create($data);

        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $event = \App\Models\Event::findOrFail($id);
        return view('admin.events_form', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:upcoming,completed,cancelled',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = \App\Models\Event::findOrFail($id);
        
        $data = $request->except(['_token']);

        if ($request->hasFile('banner')) {
            // Delete old file
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            
            $file = $request->file('banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        $event->update($data);

        return redirect()->route('admin.events')->with('success', 'Event updated successfully.');
    }

    public function destroy(string $id)
    {
        $event = \App\Models\Event::findOrFail($id);
        
        // Delete physical file
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
        
        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully.');
    }
}
