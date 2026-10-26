<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'KHP Vet')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('Guest.layouts.css')
</head>

<body>
    @include('Guest.layouts.topbar')

    @include('Guest.layouts.navbar')

    @yield('content')

    @include('Guest.layouts.footer')

    @include('Guest.layouts.js')
</body>

</html>
