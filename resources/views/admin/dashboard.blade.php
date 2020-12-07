<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ url(mix('css/style.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('admin/css/style.css')) }}">
</head>
<body>
    <a href="{{ route('admin.logout') }}">Logout</a>
    <h1>Painel de Admin</h1>

    <button class="btn btn-lg btn-orange">OK</button>
    <script src="{{ mix('js/jquery.js') }}"></script>
    <script src="{{ mix('js/bootstrap.js') }}"></script>
</body>
</html>
