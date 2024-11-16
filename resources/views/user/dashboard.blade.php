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
    @php
        $user = Auth::user();
    @endphp

    <!-- Menampilkan data user -->
    <div class="flex justify-between p-2 bg-purple-600 items-center">
        <h1 class=" text-center text-white  ">
            Selamat Datang <b>' {{ $user->name }} </b>
            ' Didalam Dashboard Anda
        </h1>
        <div class="bg-white w-10 h-10 rounded-full">

        </div>
    </div>
    <p class="xl:pt-3 text-gray-600 mb-6 text-center xl:font-bold xl:text-xl">Kami senang Anda kembali! Berikut adalah ringkasan
        singkat aktivitas terbaru Anda:</p>

    {{-- <p>file: resources/views/user/dashboard.blade.php</p> --}}

    @include('user.components.overview')
    <div class="flex flex-col xl:flex-row">
        <section>
            @include('user.components.quickActions')

        </section>
        <section class="right-0">
            @include('user.components.notifications')
        </section>
    </div>
    @include('user.components.message')

    <!-- Set Alert biar muncul kalo error -->
    @include('components.alert')

    <!-- ambil data user -->

    <br>
    <br>

    <!-- Navigasi -->
    <ul>
        <li>
            <a href="{{ route('complaint') }}">Complaint List</a>
        </li>
        <li>
            <!-- untuk logout gunakan ini -->
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    </ul>

</body>

</html>
