<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Lightbox -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" bg-white">
@include('components.alert')
    <div class=" md:p-4 bg-white min-h-screen">
        <div class=" mx-auto p-1 lg:p-5 shadow-lg rounded-lg overflow-hidden">
            <div class=" flex justify-end pr-10">
                <a href="javascript:history.back()"
                    class="flex items-center w-32 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

            <!-- Complaint Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Complaint Image -->
                <div class="p-3">
                    <a href="https://via.placeholder.com/600" data-lightbox="complaint-image">
                        <img src="{{$complaint->photo}}" alt="Complaint Image"
                            class="object-cover w-full h-96 rounded-t-lg md:rounded-none md:rounded-l-lg">
                    </a>
                </div>

                <!-- Complaint Info -->
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $complaint->title }}</h1>

                    <!-- Category -->
                    <div class="flex items-center mb-4">
                        <i class="fas fa-tag text-blue-500 mr-2"></i>
                        <p class="text-sm text-gray-600 font-semibold">Kategori: {{ $complaint->category->name }}</p>
                    </div>

                    <!-- Created At -->
                    <div class="flex items-center mb-4">
                        <i class="fas fa-clock text-green-500 mr-2"></i>
                        <p class="text-sm text-gray-600">Diajukan pada:
                            {{ $complaint->created_at->format('Y-m-d H:i') }}</p>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h2>
                        <p class="text-gray-700">{{ $complaint->description }}</p>
                    </div>

                    <!-- Status -->
                    <div class="mb-4 flex items-center">
                        <h2 class="text-lg font-semibold text-gray-800 mr-4">Status Saat Ini:</h2>
                        <div
                            class="inline-flex items-center 
                            {{ $complaint->status == 'Pending'
                                ? 'bg-yellow-100 text-yellow-800'
                                : ($complaint->status == 'In Progress'
                                    ? 'bg-blue-100 text-blue-800'
                                    : 'bg-green-100 text-green-800') }} 
                            text-sm font-semibold px-4 py-1 rounded-full">
                            <i
                                class="fas {{ $complaint->status == 'Pending'
                                    ? 'fa-clock'
                                    : ($complaint->status == 'In Progress'
                                        ? 'fa-spinner'
                                        : 'fa-check-circle') }} mr-2"></i>
                            {{ $complaint->status }}
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-green-500"></i>
                            <h2 class="text-lg font-semibold text-gray-800 ml-2">Lokasi</h2>
                        </div>
                        <p class="text-gray-700">{{ $complaint->location }}</p>
                    </div>
                </div>
            </div>

            <!-- Status History and Back Button -->


            <!-- Comment Section -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 ">
                <section class="bg-white text-gray-800 rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-4 flex items-center space-x-2">
                        <i class="fas fa-history"></i>
                        <span>Riwayat Status</span>
                    </h2>
                    <div class="space-y-4">
                        @foreach ($complaint->complaintHistory as $statusHistory)
                            <div
                                class="flex items-start bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                <i class="fas fa-user-circle text-gray-600 text-3xl mr-4"></i>
                                <div>
                                    <p class="text-gray-700"><span class="font-semibold">Dibuat Oleh:</span>
                                        {{ $statusHistory->changedBy->name }}</p>
                                    <p class="text-gray-700"><span class="font-semibold">Date:</span>
                                        {{ $statusHistory->created_at }}</p>
                                    <p class="text-gray-700"><span class="font-semibold">Status:</span>
                                        {{ $statusHistory->status }}</p>
                                    <p class="text-gray-700"><span class="font-semibold">Deskripsi:</span>
                                        {{ $complaint->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Add and Display Comments -->
                <section class="bg-white text-gray-800 rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-4 flex items-center space-x-2">
                        <i class="fas fa-comments"></i>
                        <span>Comments</span>
                    </h2>
                    <form action="{{ route('response.add') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                        <textarea name="response_text" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                            placeholder="Write your comment here..."></textarea>
                        <button type="submit"
                            class="bg-gray-800 text-white px-6 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition duration-200">
                            <i class="fas fa-paper-plane"></i>
                            <span>Submit Comment</span>
                        </button>
                    </form>
                    <div class="space-y-4 mt-6">
                        @foreach ($complaint->responses as $response)
                            <div
                                class="flex items-start bg-gray-50 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                <i class="fas fa-user-circle text-gray-600 text-3xl mr-4"></i>
                                <div>
                                    <p class="font-medium text-gray-700">{{ $response->user->name }}</p>
                                    <p class="text-gray-600">{{ $response->response_text }}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>

</html>
