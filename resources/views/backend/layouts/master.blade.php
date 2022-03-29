<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Laravel Role Admin')</title>

    @include('backend.layouts.partials.style')

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>

    <div id="app">
        @include('backend.layouts.partials.sidebar')

        <div id="main">
            <header class="mb-3">
                @include('backend.layouts.partials.message')
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


           @yield('admin-content')


           <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>{{ date('Y') }} &copy; Dipta</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">A. Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
    </div>
   @include('backend.layouts.partials.script')
</body>

</html>
