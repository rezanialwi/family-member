<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;

class FamilyMemberApiController extends Controller
{
    public function index()
    {
        return FamilyMember::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        return FamilyMember::create($request->all());
    }

    public function show(FamilyMember $familyMember)
    {
        return $familyMember;
    }

    public function update(Request $request, FamilyMember $familyMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        $familyMember->update($request->all());
        return $familyMember;
    }

    public function destroy(FamilyMember $familyMember)
    {
        $familyMember->delete();
        return response()->json(['message' => 'Family member deleted successfully']);
    }
}
