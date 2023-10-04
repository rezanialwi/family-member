<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;

class FamilyMemberApiController extends Controller
{
    public function index()
    {
        $familyMembers = FamilyMember::all();
        return $this->responseGet($familyMembers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);

        $familyMember = FamilyMember::create($request->all());
        return $this->responsePost($familyMember); // 201 Created
    }

    public function show(FamilyMember $familyMember)
    {
        return $this->responseGet($familyMember);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'parent_id' => 'nullable|exists:family_members,id',
        ]);
        $familyMember = FamilyMember::find($id);
        if (!$familyMember) {
            return $this->responsePatch(null, 404);
        }
        $familyMember->update($request->all());
        return $this->responsePatch($familyMember);
    }

    public function destroy($id)
    {
        $familyMember = FamilyMember::findOrFail($id);

        $familyMember->delete();
        return $this->responseDelete($familyMember);
    }
}
