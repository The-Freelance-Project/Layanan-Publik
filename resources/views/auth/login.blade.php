<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ env('APP_NAME') }}</title>

    <!-- Set TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<h1>HALAMAN LOGIN</h1>
<p>file: resources/views/auth/login.blade.php</p>

<br><br>

    <!-- Set Alert biar muncul kalo error -->
    @include('components.alert')
    
    <h1>
        Halaman Login
    </h1>

    <!-- Aksi Login :
    form action="{{ route('login.action') }}"
    input :
        <input name="email" type="email" >
        <input name="password" type="password" >

    jangan lupa @csrf di dalam tag form -->

    <!-- ini di bawah buat contoh aja -->
        
    <br>
    <br>
    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        email
        <input name="email" type="email"> <br>
        password
        <input name="password" type="password"> <br>

        <input name="submit" type="submit">
    </form>

</body>
</html>