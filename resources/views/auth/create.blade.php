<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {

            width: 300px;
            margin: 20vh auto;
            padding: 20px;
            border: 1px solid #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #fff;
            border-radius: 3px;
            background-color: #555;
            color: #fff;
        }

        .form-group input[type="submit"] {
            width: 100%;
            background-color: black;
            color: #fff;
            cursor: pointer;
        }

        .addons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .forgot a {
            color: rgb(34, 159, 227);
            text-decoration: none;

        }
    </style>
    
</head>
<body>
    
    <div class="container">
        <h2>Login</h2>


        <form method="post" action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation"> Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="addons">
                <div class="remember-me">
                   <input type="checkbox" name="remember" style="margin-right: 5px" > Remember me    
                </div>
                <div class="forgot"> <a href="#"> ? Forget password </a> </div>
            </div>
            <div class="form-group ">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script> --}}
</body>
</html>
