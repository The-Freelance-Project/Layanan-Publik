<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Set TailwindCss -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body>

        @include('components.alert')

        <h1>
            Halaman Profile
        </h1>

        <br>

        INFORMASI DATA USER
        
        <ul>
            <li>Nama: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Role: {{ $user->role }}</li>
        </ul>

        <br>
        <hr>
        <br>

        <!-- FORM EDIT NAMA USER -->

        <p>GANTI NAMA USER</p>
        <form action="{{ route('profile.change.name') }}" method="post">
            @csrf
            <div>
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <button type="submit">Ubah Nama</button>
        </form>


        <!-- FORM GANTI PASSWORD USER -->
        <p>GANTI PASSWORD USER</p>
        <form action="{{ route('profile.change.password') }}" method="post">
            @csrf
            <div>
                <label for="old_password">Password Lama</label>
                <input type="text" name="old_password" id="old_password">
            </div>

            <div>
                <label for="new_password">Password Baru</label>
                <input type="text" name="new_password" id="new_password">
            </div>

            <div>
                <label for="name">Ulangi Password Baru</label>
                <input type="text" name="new_password_confirmation" id="new_password">
            </div>

            <button type="submit">Ubah Password Akun</button>
        </form>


    </body>
</html>
