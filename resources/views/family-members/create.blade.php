@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Family Member</h1>
        <form action="{{ route('family-members.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="parent_id">Parent:</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">No Parent</option>
                    @foreach ($familyMembers as $familyMember)
                    <option value="{{ $familyMember->id }}">{{ $familyMember->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Family Member</button>
            <a href="{{ route('family-members.index') }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
@endsection
