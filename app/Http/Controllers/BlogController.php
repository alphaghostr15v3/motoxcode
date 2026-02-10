<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = \App\Models\Blog::latest()->get();
        return view('admin.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|alpha_dash|unique:blogs',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['_token']);
        
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        $data['is_published'] = $request->has('is_published');
        if ($data['is_published'] && !$request->published_at) {
            $data['published_at'] = now();
        }

        \App\Models\Blog::create($data);

        return redirect()->route('admin.blogs')->with('success', 'Post created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        return view('admin.blogs_form', compact('blog'));
    }

    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|alpha_dash|unique:blogs,slug,'.$id,
            'content' => 'required',
            'author' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = \App\Models\Blog::findOrFail($id);
        
        $data = $request->except(['_token']);
        
        if ($request->hasFile('image_file')) {
            // Delete old file
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        $data['is_published'] = $request->has('is_published');

        $blog->update($data);

        return redirect()->route('admin.blogs')->with('success', 'Post updated successfully.');
    }

    public function destroy(string $id)
    {
        $blog = \App\Models\Blog::findOrFail($id);
        
        // Delete physical file
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        
        $blog->delete();

        return redirect()->route('admin.blogs')->with('success', 'Post deleted successfully.');
    }
}
