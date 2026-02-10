<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Member;
use App\Models\Rider;
use App\Models\SafetyRule;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch Settings
        $settings = Setting::pluck('value', 'key')->toArray();

        // Fetch Stats
        $stats = [
            'members' => Member::count() + 450, // Real + Offset for design
            'events' => Event::count() + 100,
            'miles' => 50000 + (Member::count() * 100)
        ];

        // Fetch Data
        $events = Event::where('status', 'upcoming')->orderBy('date', 'asc')->take(3)->get();
        $gallery = GalleryImage::latest()->take(6)->get();
        $featuredMembers = Member::take(4)->get();
        $blogs = Blog::where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();
        $safetyRules = SafetyRule::where('is_active', true)->get();
        $testimonials = Testimonial::where('is_active', true)->take(3)->get();
        $riders = Rider::orderBy('rank', 'asc')->take(10)->get();

        return view('welcome', compact(
            'settings', 
            'stats', 
            'events', 
            'gallery', 
            'featuredMembers', 
            'blogs', 
            'safetyRules', 
            'testimonials',
            'riders'
        ));
    }

    public function about()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('about', compact('settings'));
    }

    public function events(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        
        $query = Event::orderBy('date', 'asc');

        if ($request->has('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }

        $events = $query->get();
        
        return view('events', compact('settings', 'events'));
    }

    public function gallery()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $gallery = GalleryImage::latest()->get();
        return view('gallery', compact('settings', 'gallery'));
    }

    public function contact()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('contact', compact('settings'));
    }

    public function blogs()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $blogs = Blog::where('is_published', true)->orderBy('published_at', 'desc')->paginate(9);
        return view('blogs', compact('settings', 'blogs'));
    }

    public function blogDetails($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $blog = Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recentBlogs = Blog::where('is_published', true)->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('blog_show', compact('settings', 'blog', 'recentBlogs'));
    }

    public function testimonials()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $testimonials = Testimonial::where('is_active', true)->latest()->get();
        return view('testimonials', compact('settings', 'testimonials'));
    }

    public function join()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('join', compact('settings'));
    }

    public function storeJoin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'machine' => 'required|string|max:255',
            'level' => 'required|string',
            'bio' => 'nullable|string',
        ]);

        // Create the join request
        \App\Models\JoinRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'machine' => $request->machine,
            'level' => $request->level,
            'bio' => $request->bio,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Request submitted successfully! We will contact you shortly.');
    }
}
