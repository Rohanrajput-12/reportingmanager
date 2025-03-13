@extends('admin.layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">User List</h2>

    <!-- Add Button (optional) -->
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Add New User</a>

    <!-- User Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataList as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- View Button (optional) -->

                        <!-- Edit Button -->
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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
