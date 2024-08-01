<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content:space-between; align-items:center;">
        <div>
            <h1>Admin Dashboard</h1>
            <div style="margin-bottom: 16px;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background-color: gray; color: black;" class="btn">Đăng Xuất</button>
                </form>
            </div>
        </div>
        <div>
            <h3>Xin chào {{ $user->fullname }} !!</h3>

        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success" style="margin-top: 12px;">
        {{ session('success') }}
    </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->active ? 'active' : 'inactive' }}</td>
                <td>
                    <form action="{{ route('admin.toggleActivation', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn {{ $user->active ? 'btn-danger' : '' }}">
                            {{ $user->active ? 'Inactive' : 'Activate' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>