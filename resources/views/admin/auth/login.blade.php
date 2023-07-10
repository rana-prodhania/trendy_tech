<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Login Form Example</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/admin.login.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        @if (Session::has('error'))
            <div class="alert alert-danger">
                <h3 class="error">{{ Session::get('error') }}</h3>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <h1>Admin Login</h1>
            <div class="content">
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="input-field">
                    <input name="password" type="password" placeholder="Password">
                </div>
                <a href="#" class="link">Forgot Your Password?</a>
            </div>
            <div class="action">
                <button type="submit">Sign in</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script src="{{ asset('backend/assets/js/admin.login.js') }}"></script>

</body>

</html>
