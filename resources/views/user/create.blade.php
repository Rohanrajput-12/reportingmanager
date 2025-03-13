@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Add New User</h2>

    <!-- User Create Form -->
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->

        <!-- Reporting Manager (Optional) -->
        <div class="mb-3">
            <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
            <select name="role_id" id="role_id" class="form-select" required>
                <option value="">Select Repoting Manager</option>
                @foreach ($roleList as $id => $role)
                    <option value="{{ $id }}" {{ old('role_id') == $id ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
            @error('role_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Create User</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
