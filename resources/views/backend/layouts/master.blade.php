<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    @include('backend.layouts.partials.style')
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('backend.layouts.partials.sidebar')



           @yield('admin-content')

    </div>
   @include('backend.layouts.partials.script')
</body>

</html>
