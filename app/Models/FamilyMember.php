<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'parent_id'];

    // Relationship: Get the parent of a family member
    public function parent()
    {
        return $this->belongsTo(FamilyMember::class, 'parent_id');
    }

    // Relationship: Get the children of a family member
    public function children()
    {
        return $this->hasMany(FamilyMember::class, 'parent_id');
    }
}
