<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Include TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="flex items-center justify-center min-h-screen bg-gradient-to-r from-red-600 via-yellow-500 to-black relative">
    <!-- Alert Component for Error Messages -->
    @include('components.alert')

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full relative z-10">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-6">Buat Akun Baru</h1>
        <p class="text-center text-gray-600 mb-8">Silakan daftar untuk mendapatkan akses</p>

        <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="name" name="name" type="text" placeholder="Masukkan nama lengkap Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input id="email" name="email" type="email" placeholder="Masukkan email Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input id="password" name="password" type="password" placeholder="Masukkan kata sandi Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata
                    Sandi</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Ulangi kata sandi Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <button type="submit"
                class="w-full py-3 bg-red-600 text-white font-bold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition duration-150 ease-in-out">Daftar</button>
        </form>

        <p class="text-center text-gray-600 mt-6">Sudah punya akun? <a href="login"
                class="text-red-600 hover:text-red-800 font-medium">Masuk</a></p>
    </div>
</body>

</html>
