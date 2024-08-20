<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <title>Tableau de bord</title>
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}" type="image/x-icon">
    @yield('css')

    @include('layouts.head-css')

</head>

<body>
@include('layouts.sidebars')

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        @yield('content')

    </div>
</main>
<!--end main wrapper-->

<!--start overlay-->
    <div class="overlay btn-toggle"></div>
<!--end overlay-->


  @include('layouts.vendor-scripts')
  @yield('scripts')

</body>
  
</html>
