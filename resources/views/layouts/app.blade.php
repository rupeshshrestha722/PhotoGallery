<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo Show</title>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.1/css/foundation.css">
</head>
<body>
    @include('inc.topbar')
    <br>
    <div class = "row">
        @include('inc.messages')
@yield('content')
    </div>
</body>
</html>