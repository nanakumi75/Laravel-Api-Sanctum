<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <p>You have received a message from {{ $data['name'] }}</p>
    <p>Message Details below</p>
    <p>{{ $data['email'] }}</p>
    <p>{{ $data['subject'] }}</p>
    <p>{{ $data['message'] }}</p>
</body>
</html>