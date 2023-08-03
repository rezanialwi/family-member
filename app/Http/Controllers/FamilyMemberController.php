<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;

class FamilyMemberController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $familyMembers = FamilyMember::with('parent', 'children')->get();
        return view('family-members.index', compact('familyMembers'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $familyMembers = FamilyMember::with('parent', 'children')->get();

        return view('family-members.create', compact('familyMembers'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        FamilyMember::create($request->all());

        return redirect()->route('family-members.index')->with('success', 'Family member created successfully!');
    }

    // Show the specified resource.
    public function show(FamilyMember $familyMember)
    {
        return view('family-members.show', compact('familyMember'));
    }

    // Show the form for editing the specified resource.
    public function edit(FamilyMember $familyMember)
    {
        $familyMembers = FamilyMember::with('parent', 'children')->get();

        return view('family-members.edit', compact('familyMember', 'familyMembers'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, FamilyMember $familyMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        $familyMember->update($request->all());

        return redirect()->route('family-members.index')->with('success', 'Family member updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy(FamilyMember $familyMember)
    {
        $familyMember->delete();

        return redirect()->route('family-members.index')->with('success', 'Family member deleted successfully!');
    }

    public function tree()
    {
        $familyMembers = FamilyMember::with('parent', 'children')->get();

        return view('family-members.family_tree', compact('familyMembers'));
    }
}
