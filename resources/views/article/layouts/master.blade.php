<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    
    <title>@yield('title')</title>
</head>
<body>
    <div class="container" id="app">
        <div class="col-12 mt-5">
            @yield('page_content')
        </div>
    </div>

</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/app.js"></script>
</html>