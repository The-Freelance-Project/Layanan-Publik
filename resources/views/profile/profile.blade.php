<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile - Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Set TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">

        <!-- Alert Notification -->
        @include('components.alert')

        <!-- Page Title -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-700">Halaman Profile</h1>
        </header>

        <!-- User Info -->
        <section class="bg-gray-50 p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Informasi Data User</h2>
            <ul class="space-y-4 text-lg text-gray-700">
                <li><strong>Nama:</strong> {{ $user->name }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Role:</strong> {{ $user->role }}</li>
            </ul>
        </section>

        <!-- Form Edit Nama -->
        <section class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Ganti Nama User</h2>
            <form action="{{ route('profile.change.name') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-600">Nama</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Ubah
                    Nama</button>
            </form>
        </section>

        <!-- Form Ganti Password -->
        <section class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Ganti Password User</h2>
            <form action="{{ route('profile.change.password') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="old_password" class="block text-lg font-medium text-gray-600">Password Lama</label>
                    <input type="password" name="old_password" id="old_password"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="new_password" class="block text-lg font-medium text-gray-600">Password Baru</label>
                    <input type="password" name="new_password" id="new_password"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-lg font-medium text-gray-600">Ulangi
                        Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300">Ubah
                    Password Akun</button>
            </form>
        </section>

    </div>

</body>

</html>
