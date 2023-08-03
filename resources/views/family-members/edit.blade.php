@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Family Member</h1>
        <form action="{{ route('family-members.update', $familyMember->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $familyMember->name }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="M" {{ $familyMember->gender === 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ $familyMember->gender === 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="parent_id">Parent:</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">No Parent</option>
                    @foreach ($familyMembers as $member)
                    <option value="{{ $member->id }}" {{ $familyMember->parent_id === $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Family Member</button>
            <a href="{{ route('family-members.index') }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
@endsection
