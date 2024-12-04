<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Hero Section -->
    <section class="relative bg-[#003f87] text-white"> <!-- Blue Navy background -->
        <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col-reverse flex-col md:flex-row items-center">
            <!-- Left Content -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    Solusi Pengaduan Masyarakat Terbaik
                </h1>
                <p class="text-lg mb-8">
                    Laporkan masalah di lingkungan Anda dengan cepat, transparan, dan mudah. Kami hadir untuk membantu
                    Anda.
                </p>
                <div class="flex">
                    <a href="#laporkan"
                        class="bg-yellow-500 text-[#003f87] px-6 py-3 rounded-lg shadow-md hover:bg-yellow-600 transition">
                        Laporkan Pengaduan
                    </a>
                    <a href="#learn-more"
                        class="ml-4 text-white border border-white px-6 py-3 rounded-lg hover:bg-[#003f87] hover:text-yellow-500 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- Right Content (Illustration or Image) -->
            <div class=" md:w-[300px] md:ml-40 mt-10 md:mt-0 flex justify-center">
                <img src="/logo.png" alt="Hero Illustration" class="w-full max-w-md">
            </div>
        </div>

        <!-- Decorative Shape -->
        {{-- <div class="absolute bottom-0 left-0 right-0 h-16 bg-[#003f87]"></div> --}}
    </section>

</body>

</html>
