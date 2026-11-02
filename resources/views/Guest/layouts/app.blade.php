<!DOCTYPE html>
<html lang="id">

<head>
    @include('Guest.partials.head')
</head>

<body>
    @include('Guest.partials.topbar')
    @include('Guest.partials.navbar')

    @yield('content')

    @include('Guest.partials.footer')
    @include('Guest.partials.scripts')
</body>

</html>
