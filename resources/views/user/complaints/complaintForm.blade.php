<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Set TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-100 via-indigo-200 to-purple-300">

    <!-- Alert (Jika ada pesan error) -->
    @include('components.alert')

    <!-- Form Container -->
    <section class="flex">
        @include('user.components.sidebar')
        <div class="max-w-xl mx-auto p-6 bg-white shadow-2xl rounded-lg mt-8">
            <!-- Title Section -->
            <h1 class="text-4xl font-bold text-center text-indigo-600 mb-6">
                <i class="fas fa-pen-alt text-xl mr-2"></i>Tambah Pengaduan
            </h1>
            <p class="text-center text-gray-700 mb-8">Beri kami pengaduan Anda dan kami akan menindaklanjutinya segera.
            </p>

            <!-- Navigasi -->
            <div class="flex justify-between mb-6">
                <ul class="space-x-6 flex items-center">
                    <li>
                        <a href="{{ route('complaint') }}"
                            class="text-green-600 hover:text-green-800 font-medium flex items-center">
                            <i class="fas fa-list-ul mr-2"></i>Daftar Pengaduan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="text-red-600 hover:text-red-800 font-medium flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Form Pengaduan -->
            <form action="{{ route('complaint.add') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Kategori -->
                <div class="space-y-4">
                    <label for="category" class="text-lg font-medium text-indigo-700 flex items-center">
                        <i class="fas fa-tags text-xl mr-2"></i>Kategori
                    </label>
                    <select name="category" id="category"
                        class="w-full p-4 border-2 border-indigo-400 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Judul Pengaduan -->
                <div class="space-y-4">
                    <label for="title" class="text-lg font-medium text-indigo-700 flex items-center">
                        <i class="fas fa-heading text-xl mr-2"></i>Judul Pengaduan
                    </label>
                    <input type="text" name="title" id="title"
                        class="w-full p-4 border-2 border-indigo-400 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan judul pengaduan" required>
                </div>

                <!-- Deskripsi Pengaduan -->
                <div class="space-y-4">
                    <label for="description" class="text-lg font-medium text-indigo-700 flex items-center">
                        <i class="fas fa-pencil-alt text-xl mr-2"></i>Deskripsi
                    </label>
                    <textarea name="description" id="description"
                        class="w-full p-4 border-2 border-indigo-400 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Deskripsikan pengaduan Anda" required></textarea>
                </div>

                <!-- Tombol Kirim -->
                <div>
                    <button type="submit"
                        class="w-full p-4 bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold rounded-md hover:from-green-600 hover:to-teal-600 transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>

</html>
