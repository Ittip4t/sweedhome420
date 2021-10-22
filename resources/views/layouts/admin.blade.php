<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $data['description'] ?? '' }}" />
    <meta name="author" content="{{ $data['author'] ?? '' }}" />
    <title>{{config('app.name', 'Laravel')}} - {{ $data['title'] ?? '' }}</title>
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body >
<body class="sb-nav-fixed">
    <div id="app">
        <nav class="sb-topnav navbar navbar-expand d-flex navbar-dark bg-dark px-2">
           
            @include('dashboard.partials.nav')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @include('dashboard.partials.sidenav_menu')
                </nav>
            </div>

            <div id="layoutSidenav_content" >

                <main >
                    @yield('content')
                </main>

                <footer class="py-4 bg-light mt-auto">
                    @include('dashboard.partials.footer')
                </footer>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/admin/scripts.js') }}"></script>
    </div>
</body>

</html>
