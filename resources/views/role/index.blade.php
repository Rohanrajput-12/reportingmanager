@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">User List</h2>

    <!-- Add Button (optional) -->
    <a href="{{ route('role.create') }}" class="btn btn-primary mb-3">Add New Role</a>

    <!-- User Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataList as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <!-- View Button (optional) -->

                        <!-- Edit Button -->
                        <a href="{{ route('user.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('user.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination (optional) -->

</div>

@endsection
