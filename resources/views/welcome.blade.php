<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .header {
            background: #17a2b8;
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 1.75rem;
        }

        .avatar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .avatar img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            border-color: #17a2b8;
            outline: none;
        }

        .btn {
            display: inline-block;
            background: #17a2b8;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #138496;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        a {
            color: #17a2b8;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #138496;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            Xin Chào {{ Auth::user()->username }}
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="avatar">
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
        </div>

        <form method="POST" action="{{ url('/welcome') }}">
            @csrf
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="profile-picture">avata:</label>
                <input type="file" name="profile-picture" id="profile-picture" value="{{ $user->avata }}" required>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" class="btn">Update</button>
                <a href="{{ route('changePassword') }}">Đổi mật khẩu</a>
            </div>
        </form>
    </div>
</body>

</html>
