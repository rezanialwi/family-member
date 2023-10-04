@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Family Members</h1>
        <a href="{{ route('family-members.create') }}" class="btn btn-success mb-3">Add New Family Member</a>
        <a href="{{ route('family-members.tree') }}" class="btn btn-primary mb-3">Treeview Family Member</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Parent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($familyMembers as $familyMember)
                <tr>
                    <td>{{ $familyMember->name }}</td>
                    <td>{{ $familyMember->gender }}</td>
                    <td>{{ optional($familyMember->parent)->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('family-members.edit', $familyMember->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('family-members.destroy', $familyMember->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this family member?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
