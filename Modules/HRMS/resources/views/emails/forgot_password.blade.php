<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
</head>

<body>
    <h1>Forget Password Email</h1>

    You can reset password from bellow link:
    <a href="{{ route('auth.reset-password', $token) }}">Reset Password</a>
</body>

</html>