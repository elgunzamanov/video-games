<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>New Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
    <style>
        img {
            width: 400px;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Welcome to Game World!</h1>
    <img src="https://sm.pcmag.com/pcmag_in/how-to/7/7-easy-way/7-easy-ways-to-save-money-on-video-games_dyqs.jpg" class="rounded mx-auto d-block" alt=""/>
    <p>
        Hi, {{ $data["name"] }} <br/>
        Nice to see you! <br/>
        Sincerely, <br/>
        Elgun Zamanov
    </p>
    <hr/>
    Message sent to {{ $data["email"] }}. <br/>
    This is an automatically generated email, please do not reply.
    <a href="#">Unsubscribe</a> from this email.
    <a class="font-w600" href="#" target="_blank">Video Games v1.0.0</a> &copy; {{ date('Y') }}
    Copyright &copy; {{ date('Y') }} Video Games, All rights reserved.
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

</body>
</html>
