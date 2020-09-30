<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrueCare24</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
<div class="container">
    @include('includes.header')
    @include('includes.nav')
    @yield('main')
    @include('includes.modal')
</div>
<script type="text/javascript" src="{{ url('js/app.js') }}"></script>
</body>
</html>
