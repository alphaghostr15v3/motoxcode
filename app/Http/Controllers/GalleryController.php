<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = \App\Models\GalleryImage::latest()->get();
        return view('admin.gallery', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $data['is_featured'] = $request->has('is_featured');

        \App\Models\GalleryImage::create($data);

        return redirect()->route('admin.gallery')->with('success', 'Image uploaded successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $image = \App\Models\GalleryImage::findOrFail($id);
        return view('admin.gallery_form', compact('image'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = \App\Models\GalleryImage::findOrFail($id);
        
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old file
            if ($image->image_path && file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image_path'] = 'uploads/' . $filename;
        }

        $data['is_featured'] = $request->has('is_featured');

        $image->update($data);

        return redirect()->route('admin.gallery')->with('success', 'Image updated successfully.');
    }

    public function destroy(string $id)
    {
        $image = \App\Models\GalleryImage::findOrFail($id);
        
        // Delete physical file
        if ($image->image_path && file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }
        
        $image->delete();

        return redirect()->route('admin.gallery')->with('success', 'Image deleted successfully.');
    }
}
