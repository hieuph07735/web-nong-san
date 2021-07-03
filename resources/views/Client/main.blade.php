<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="Client/images/apple-touch-icon.png" type="image/x-icon">
    @include('Client._share.style')
</head>

<body>
 
    @include('Client._share.header')

    @yield('content')

    @include('Client._share.footer')

    @include('Client._share.script')

</body>
</html>
