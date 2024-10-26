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
    Halaman Register

    <!-- Set Alert biar muncul kalo error -->
    @include('components.alert')

    <!-- Aksi Register =>
    form action="{{ route('register.action') }} method="POST"
    input : 
        <input name="name" type="text">
        <input name="email" type="email"> 
        <input name="password" type="password">
        <input name="password_confirmation" type="password">
    
    jangan lupa @csrf di dalam tag form -->
        


    <!-- ini di bawah buat contoh aja -->
        
    <br>
    <br>
    <form action="{{ route('register.action') }}" method="POST">
        @csrf
        nama
        <input name="name" type="text"> <br>
        email
        <input name="email" type="email"> <br>
        password
        <input name="password" type="password"> <br>
        konfirmasi password
        <input name="password_confirmation" type="password"> <br>   

        <input name="submit" type="submit">
    </form>

</body>
</html>