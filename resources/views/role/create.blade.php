@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Add New Role</h2>

    <!-- User Create Form -->
    <form action="{{ route('role.store') }}" method="POST">
        @csrf

        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Create Role</button>
        <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
