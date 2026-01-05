<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>

@if ($errors->any())
    <div style="color:red">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('admin.login.post') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" required>
    <br>

    <input type="password" name="password" placeholder="Password" required>
    <br>

    <label>
        <input type="checkbox" name="remember" value="1">
        Remember me
    </label>
    <br>

    <button type="submit">Login</button>
</form>

</body>
</html>
