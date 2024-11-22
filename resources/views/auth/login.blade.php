<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Include Tailwind CSS -->
    <link rel="icon" type="image/x-icon" href="/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-red-600 via-yellow-500 to-black">
    <!-- Alert Component for Error Messages -->

    @include('components.alert')

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-6">Selamat Datang!</h1>
        <p class="text-center text-gray-600 mb-8">Silakan masuk ke akun Anda</p>

        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input id="email" name="email" type="email" placeholder="Masukkan email Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input id="password" name="password" type="password" placeholder="Masukkan kata sandi Anda"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                    required>
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-red-600 focus:ring-red-600 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-800">Ingat saya</label>
                </div>
                <a href="#" class="text-sm text-red-600 hover:text-red-800">Lupa Kata Sandi?</a>
            </div>

            <button type="submit"
                class="w-full py-3 bg-red-600 text-white font-bold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition duration-150 ease-in-out">Masuk</button>
        </form>

        <p class="text-center text-gray-600 mt-6">Belum punya akun? <a href="register"
            class="text-red-600 hover:text-red-800 font-medium">Daftar</a></p>

        <div class="w-full flex justify-center items-center mt-3">
            <div class="flex-1 border-b border-gray-500"></div>
            <div class="mx-2 text-gray-600">atau</div>
            <div class="flex-1 border-b border-gray-500"></div>
        </div>

        <a href="{{ route('redirect') }}" class="mt-4 w-full flex justify-center">  
            <button
                aria-label="Sign in with Google"
                class="flex items-center gap-3 bg-google-button-blue rounded-full p-0.5 pr-4 transition-colors duration-300 hover:bg-google-button-blue-hover"
                >
                <div class="flex items-center justify-center bg-white w-9 h-9 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                    <title>Sign in with Google</title>
                    <desc>Google G Logo</desc>
                    <path
                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                        class="fill-google-logo-blue"
                    ></path>
                    <path
                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                        class="fill-google-logo-green"
                    ></path>
                    <path
                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                        class="fill-google-logo-yellow"
                    ></path>
                    <path
                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                        class="fill-google-logo-red"
                    ></path>
                    </svg>
                </div>
                <span class="text-sm text-white tracking-wider">Login dengan akun Google</span>
            </button>
        </a>
    </div>
</body>

</html>
