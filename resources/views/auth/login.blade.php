<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            max-width: 500px;
            width: 100%;
        }

        .card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: box-shadow 0.3s ease-in-out;
            margin: 20px 0;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: #17a2b8;
            color: #fff;
            padding: 20px;
            font-size: 1.5rem;
            text-align: center;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .alert-success,
        .alert-danger {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid transparent;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
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
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #138496;
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
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">Login User</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <button type="submit" class="btn">Submit</button>
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
