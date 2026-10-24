<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') - KHP Vet</title>

  <!-- SEO Optimization -->
  <meta name="description" content="Spark Admin - Premium Bootstrap 5 Admin Dashboard Template">
  <meta name="author" content="Spark Admin Team">

  @include('Admin.layouts.css')
</head>

<body>

  @include('Admin.layouts.sidebar')


  <!-- ==========================================
         START: Main Content Area
         ========================================== -->
  <div class="main-wrapper">

    @include('Admin.layouts.header')


    @yield('content')

    @include('Admin.layouts.footer')

  </div>
  <!-- ==========================================
         END: Main Content Area
         ========================================== -->

  @include('Admin.layouts.js')
</body>

</html>
