@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Edit User</h2>

    <!-- User Edit Form -->
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Role Selection -->
        <div class="mb-3">
            <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
            <select name="role_id" id="role_id" class="form-select" required>
                <option value="">Select Reporting Manager</option>
                @foreach ($roleList as $id => $role)
                    <option value="{{ $id }}" {{ old('role_id', $user->role_id) == $id ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
            @error('role_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
