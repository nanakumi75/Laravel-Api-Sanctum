<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Confirmation</title>
</head>
<body>
    <h3 style="text-align: center">Account Activation</h3>
    <p>Thanks for joining us</p>
    <p>Please click the link below to activate your account.</p>
    <h3>
        <a href="{{ URL('/user/verify/'.$user->verifyUser->token) }}">
            {{ URL('/user/verify/'.$user->verifyUser->token) }}
        </a>
    </h3>
    <p>We are happy to have you onboard</p>
    <p><a href="https://www.codinginstitution.com">Coding Institution</a></p>
</body>
</html>