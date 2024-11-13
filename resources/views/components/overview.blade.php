<!-- resources/views/components/overview.blade.php -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>
    <p class="text-gray-600 mb-6">Kami senang Anda kembali! Berikut adalah ringkasan singkat aktivitas terbaru Anda:</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card: Total Tasks -->
        <div class="bg-gradient-to-r from-yellow-400 via-red-400 to-pink-500 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Total Pengaduan</h3>
            {{-- <p class="text-4xl font-bold text-white mt-2">{{ $totalTasks }}</p> --}}
        </div>

        <!-- Card: Completed Tasks -->
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Pengaduan Selesai</h3>
            {{-- <p class="text-4xl font-bold text-white mt-2">{{ $completedTasks }}</p> --}}
        </div>

        <!-- Card: Notifications -->
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-4 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Pengaduan Ditolak</h3>
            {{-- <p class="text-4xl font-bold text-white mt-2">{{ $newNotifications }}</p> --}}
        </div>
    </div>

    {{-- <div class="mt-6">
        <a href="{{ route('tasks.index') }}"
        class="inline-block px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">Lihat
        Semua Tugas</a>
    </div> --}}
</div>
