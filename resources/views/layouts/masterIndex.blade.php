<!doctype html>
<html lang="es">
<head>
    @include('layouts.header')

    @include('layouts.style')
</head>

    <body class="sticky-header">
        <section>

            @include('layouts.sidebar')

            @include('layouts.header_top')

                <div class="main-content" >

                    @yield('content')

            @include('layouts.footer')

                </div>

    </section>

    @include('layouts.script')
    </body>
</html>