<html>
    <head>
        <title>Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="m-3">

 <form action="{{ route ('auth.authenticate') }}" method="POST">
    @csrf
    <div class="col-sm-8 mt-2">
        <h1 class="h3">Login</h1>
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::}}

</html>