<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = \App\Models\Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject ?? 'Contact Website',
            'message' => $request->message,
            'is_read' => false,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent. We will get back to you soon!');
    }

    public function show(string $id)
    {
        $message = \App\Models\Message::findOrFail($id);
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.messages_show', compact('message'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $message = \App\Models\Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Message deleted successfully.');
    }
}
