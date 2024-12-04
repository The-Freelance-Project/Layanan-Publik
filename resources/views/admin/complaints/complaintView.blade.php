<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Set TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-5">

        <!-- Header -->
        <header class="text-center py-5 mb-8 bg-blue-700 text-white rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold">HALAMAN COMPLAINT VIEW BYID ADMIN</h1>
        </header>

        <!-- Navigasi -->
        <nav class="bg-yellow-500 text-white rounded-lg shadow-lg p-5 mb-8">
            <h2 class="text-2xl  mb-4 text-center">Navigation</h2>
            <ul class="flex flex-wrap gap-4 justify-center">
                <li class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">
                    <a href="{{ route('complaint.admin') }}">Complaint List</a>
                </li>
                <li class="bg-yellow-600 text-white px-4 py-2 rounded-xl hover:bg-yellow-700 transition">
                    <a href="{{ route('category.list') }}">Category List</a>
                </li>
                <li class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition">
                    <a href="{{ route('chat.list') }}">Pesan / Chat</a>
                </li>
                <li class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition">
                    <a href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="bg-gray-600 text-white px-4 py-2 rounded-xl hover:bg-gray-700 transition">
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
                <li class="bg-purple-600 text-white px-4 py-2 rounded-xl hover:bg-purple-700 transition">
                    <a href="{{ redirect()->back() }}">Kembali</a>
                </li>
            </ul>
        </nav>
        <!-- Set Alert -->
        @include('components.alert')

        <!-- Complaint Details -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <ul class="space-y-4 text-gray-700">
                <li><strong>Aduan Dari:</strong> {{ $complaint->user->name }}</li>
                <li><strong>Kategori:</strong> {{ $complaint->category->name }}</li>
                <li><strong>Judul:</strong> {{ $complaint->title }}</li>
                <li><strong>Deskripsi:</strong> {{ $complaint->description }}</li>
                <li><strong>Lokasi:</strong> {{ $complaint->location }}</li>
                <li><strong>Status:</strong> {{ $complaint->status }}</li>
                <li><strong>Url Foto:</strong> <a href="{{ $complaint->photo }}" target="_blank"
                        class="text-blue-500">View Photo</a></li>
            </ul>
        </div>

        <!-- Send Message -->
        <div class="mb-8">
            <a href="{{ route('chat.form', ['id' => $complaint->user->id]) }}"
                class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600 transition">
                Kirim Pesan ke User ini
            </a>
        </div>

        <!-- Process Complaint -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-bold mb-4">Proses Aduan Ini</h2>
            <form action="{{ route('complaint.process', ['id' => $complaint->id]) }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="status" class="block text-lg font-semibold">Pilih Status</label>
                    <select name="status" id="status" class="w-full p-2 border rounded-lg bg-white">
                        <option value="pending">Pending</option>
                        <option value="in_progress">Proses Aduan</option>
                        <option value="resolved">Aduan Telah Selesai</option>
                        <option value="rejected">Tolak Aduan</option>
                        <option value="canceled">Batalkan Aduan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="note" class="block text-lg font-semibold">Catatan</label>
                    <textarea name="note" id="note" rows="4" class="w-full p-2 border rounded-lg bg-white"
                        placeholder="Masukkan catatan..."></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Proses Aduan Ini
                </button>
            </form>
        </div>

        <!-- History Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-bold mb-4">History Proses Aduan</h2>
            @foreach ($complaint->complaintHistory as $statusHistory)
                <div
                    class="flex items-start bg-gray-100 p-4 rounded-lg shadow-md mb-4 hover:shadow-lg transition duration-300">
                    <i class="fas fa-user-circle text-gray-600 text-3xl mr-4"></i>
                    <div>
                        <p class="text-gray-700"><span class="font-semibold">Dibuat Oleh:</span>
                            {{ $statusHistory->changedBy->name }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Tanggal:</span>
                            {{ $statusHistory->created_at->format('d-m-Y H:i') }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Status:</span>
                            {{ $statusHistory->status }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Catatan:</span> {{ $statusHistory->note }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add and Display Comments -->
        <section class="bg-white text-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4 flex items-center space-x-2">
                <i class="fas fa-comments"></i>
                <span>Comments</span>
            </h2>
            <form action="{{ route('response.add.admin') }}" method="POST" class="space-y-4">
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

        <!-- Footer Navigation -->
      

    </div>

</body>

</html>
