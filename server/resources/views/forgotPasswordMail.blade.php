<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <p>
        A request to reset your HiStudy password has been made.
        If you did not make this request, simply ignore this email.
        If you did make this request, please reset your password:
    </p>
    <p>
        <a href="{{ $data['url'] }}">Reset your password</a>
    </p>
</body>
</html>
