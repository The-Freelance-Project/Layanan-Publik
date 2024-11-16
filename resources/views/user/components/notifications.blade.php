{{-- @extends('layouts.dashboard') --}}

{{-- @section('content') --}}
<div class="">
    <!-- Notifikasi & Update Section -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Notifikasi & Update</h2>
        <p class="mt-2 text-gray-600">Dapatkan pembaruan terbaru terkait pengaduan Anda atau informasi penting lainnya.
        </p>

        <!-- Notifikasi List -->
        <div class="mt-4 space-y-4">
            <!-- Notification 1 -->
            <div
                class="flex items-center justify-between p-4 bg-green-50 border-l-4 border-green-500 rounded-lg shadow-sm">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6 text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <div>
                        <p class="text-lg font-medium text-gray-800">Pengaduan Anda Telah Selesai</p>
                        <p class="text-sm text-gray-600">Pengaduan mengenai kebersihan lingkungan Anda telah
                            diselesaikan pada 10 Oktober 2024.</p>
                    </div>
                </div>
                <span class="text-sm text-gray-500">1 menit yang lalu</span>
            </div>

            <!-- Notification 2 -->
            <div
                class="flex items-center justify-between p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg shadow-sm">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0l3-3m-3 3l-3-3"></path>
                    </svg>
                    <div>
                        <p class="text-lg font-medium text-gray-800">Pengaduan Anda Sedang Diproses</p>
                        <p class="text-sm text-gray-600">Pengaduan mengenai jalan rusak sedang diproses dan akan segera
                            diperbaiki.</p>
                    </div>
                </div>
                <span class="text-sm text-gray-500">30 menit yang lalu</span>
            </div>

            <!-- Notification 3 -->
            <div class="flex items-center justify-between p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8l-6 6-6-6"></path>
                    </svg>
                    <div>
                        <p class="text-lg font-medium text-gray-800">Tindak Lanjut Diperlukan</p>
                        <p class="text-sm text-gray-600">Tindak lanjut diperlukan untuk pengaduan Anda mengenai saluran
                            air yang tersumbat.</p>
                    </div>
                </div>
                <span class="text-sm text-gray-500">2 jam yang lalu</span>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
