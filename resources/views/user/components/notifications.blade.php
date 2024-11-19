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


             @foreach ($notifications as $notif)

                <!-- Jika Pengajuan TERKIRIM Pakai Notif ini  -->
                @if ($notif->title == "Pengaduan Terkirim")
                    <div
                        class="flex items-center justify-between p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0l3-3m-3 3l-3-3"></path>
                            </svg>
                            <div>
                                <p class="text-lg font-medium text-gray-800">{{$notif->title}}</p>
                                <p class="text-sm text-gray-600">{{$notif->text}}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notif->created_at)->locale('id')->diffForHumans() }}
                        </span>
                    </div>
                <!-- ------------ ------------------- ---------- ------- ------ ------ -->
                

                <!-- Jika Pengajuan IN_PROGRES Pakai Notif ini  -->
                @elseif($notif->title == "Pengaduan Diproses")
                    <div
                        class="flex items-center justify-between p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0l3-3m-3 3l-3-3"></path>
                            </svg>
                            <div>
                                <p class="text-lg font-medium text-gray-800">{{$notif->title}}</p>
                                <p class="text-sm text-gray-600">{{$notif->text}}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notif->created_at)->locale('id')->diffForHumans() }}</span>
                    </div>
                <!-- ------------ ------------------- ---------- ------- ------ ------ -->


                <!-- Jika Pengajuan DITOLAK Pakai Notif ini  -->
                @elseif($notif->title == "Pengaduan Ditolak")
                    <div class="flex items-center justify-between p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8l-6 6-6-6"></path>
                            </svg>
                            <div>
                                <p class="text-lg font-medium text-gray-800">{{$notif->title}}</p>
                                <p class="text-sm text-gray-600">{{$notif->text}}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notif->created_at)->locale('id')->diffForHumans() }}</span>
                    </div>
                <!-- ------------ ------------------- ---------- ------- ------ ------ -->


                <!-- Jika Pengajuan SELESAI Pakai Notif ini  -->
                @elseif($notif->title == "Pengaduan Diselesaikan")
                    <div
                        class="flex items-center justify-between p-4 bg-green-50 border-l-4 border-green-500 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <div>
                                <p class="text-lg font-medium text-gray-800">{{$notif->title}}</p>
                                <p class="text-sm text-gray-600">{{$notif->text}}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notif->created_at)->locale('id')->diffForHumans() }}</span>
                    </div>
                <!-- ------------ ------------------- ---------- ------- ------ ------ -->

                
                <!-- Jika Pengajuan DIBATALKAN Pakai Notif ini  -->
                @elseif($notif->title == "Pengaduan Dibatalkan")
                    <div class="flex items-center justify-between p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-6 w-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8l-6 6-6-6"></path>
                            </svg>
                            <div>
                                <p class="text-lg font-medium text-gray-800">{{$notif->title}}</p>
                                <p class="text-sm text-gray-600">{{$notif->text}}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notif->created_at)->locale('id')->diffForHumans() }}</span>
                    </div>
                <!-- ------------ ------------------- ---------- ------- ------ ------ -->
                @endif
                 
             @endforeach


            

        </div>
    </div>
</div>
{{-- @endsection --}}
