<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .error {
            color: red;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đăng Nhập</h1>

        @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Mật Khẩu:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ tôi
                </label>
            </div>
            <div>
                <button type="submit">Đăng Nhập</button>
            </div>
        </form>

        <div class="register-link">
            <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
        </div>
    </div>
</body>

</html>