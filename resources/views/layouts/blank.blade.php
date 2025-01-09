<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <!-- Only load the login CSS (avoid style.css) -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- Yield the main content for the login page -->
    @yield('content')
</body>

</html>