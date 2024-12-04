<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Set TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Lightbox -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-5">

        <!-- Header -->
        <header class="text-center py-5 mb-8 bg-blue-700 text-white rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold">HALAMAN COMPLAINT LIST ADMIN</h1>
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

        <div class="my-8">
            <!-- Filter Form -->
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Filter Complaint</h2>
            <form action="" method="get">
                @csrf
                <div class="mb-4">
                    <label for="status" class="block text-lg font-semibold">Filter By Status</label>
                    <select name="status" id="status" class="w-full p-2 border rounded-lg bg-white">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progres" {{ request('status') == 'in_progres' ? 'selected' : '' }}>Dalam
                            Proses</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Selesai
                        </option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak
                        </option>
                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Dibatalkan
                        </option>
                    </select>
                </div>
                <div class="mb-4 flex space-x-4">
                    <div class="w-full">
                        <label for="start_date" class="block text-lg font-semibold">Dari Tgl</label>
                        <input type="date" name="start_date" id="start_date"
                            class="w-full p-2 border rounded-lg bg-white" value="{{ request('start_date') }}">
                    </div>
                    <div class="w-full">
                        <label for="end_date" class="block text-lg font-semibold">Hingga Tgl</label>
                        <input type="date" name="end_date" id="end_date"
                            class="w-full p-2 border rounded-lg bg-white" value="{{ request('end_date') }}">
                    </div>
                </div>
                <div class="flex space-x-4 mt-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Filter
                        Complaint</button>
                    <a href="{{ url()->current() }}"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Reset Filter</a>
                </div>
            </form>
        </div>

        <!-- Complaint Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $complaint)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $complaint->title }}</td>
                            <td class="px-4 py-2">{{ $complaint->category->name }}</td>
                            <td class="px-4 py-2">{{ $complaint->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="px-2 py-1 rounded-full text-white 
                                {{ $complaint->status == 'pending' ? 'bg-yellow-500' : '' }}
                                {{ $complaint->status == 'in_progres' ? 'bg-blue-500' : '' }}
                                {{ $complaint->status == 'resolved' ? 'bg-green-500' : '' }}
                                {{ $complaint->status == 'rejected' ? 'bg-red-500' : '' }}
                                {{ $complaint->status == 'canceled' ? 'bg-gray-500' : '' }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('complaint.view.admin', ['id' => $complaint->id]) }}"
                                    class="text-blue-500 hover:text-blue-700">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination (if any) -->
        <div class="mt-8">
            {{-- {{ $complaints->links() }} --}}
        </div>

    </div>

</body>

</html>
