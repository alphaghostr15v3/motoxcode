<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SafetyRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = \App\Models\SafetyRule::all();
        return view('admin.safety', compact('rules'));
    }

    public function create()
    {
        return view('admin.safety_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        if (empty($data['icon'])) {
            $data['icon'] = 'fas fa-shield-alt';
        }

        \App\Models\SafetyRule::create($data);

        return redirect()->route('admin.safety')->with('success', 'Safety rule added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $rule = \App\Models\SafetyRule::findOrFail($id);
        return view('admin.safety_form', compact('rule'));
    }

    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $rule = \App\Models\SafetyRule::findOrFail($id);
        
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
         if (empty($data['icon'])) {
            $data['icon'] = 'fas fa-shield-alt';
        }

        $rule->update($data);

        return redirect()->route('admin.safety')->with('success', 'Safety rule updated successfully.');
    }

    public function destroy(string $id)
    {
        $rule = \App\Models\SafetyRule::findOrFail($id);
        $rule->delete();

        return redirect()->route('admin.safety')->with('success', 'Safety rule deleted successfully.');
    }
}
