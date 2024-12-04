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

<body class="">

    <div class="container mx-auto p-5">

        <!-- Header -->
        <header class="text-center py-5 bg-blue-700 p-5 text-white  rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-2">Dashboard Admin</h1>
            <p class="text-lg italic">file: resources/views/admin/dashboard.blade.php</p>
        </header>

        <!-- Alert -->
        @include('components.alert')

        <!-- User Information -->
        {{-- <section class="bg-white text-black rounded-lg shadow-lg p-5 mb-8"> --}}
        {{-- <p><strong>Name:</strong> {{ $user->name }}</p> --}}
        {{-- <p><strong>Email:</strong> {{ $user->email }}</p> --}}
        {{-- </section> --}}

        <!-- Navigation -->
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

        <!-- Complaint Stats -->
        <section class="bg-white rounded-lg shadow-lg p-5 mb-8">
            <h2 class="text-2xl font-bold mb-4 text-center text-blue-700">Complaint Statistics</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-blue-600 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">Total</p>
                    <p>{{ $totalComplaint }}</p>
                </div>
                <div class="bg-yellow-600 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">Pending</p>
                    <p>{{ $pendingComplaint }}</p>
                </div>
                <div class="bg-red-600 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">In Progress</p>
                    <p>{{ $inProgressComplaint }}</p>
                </div>
                <div class="bg-green-600 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">Resolved</p>
                    <p>{{ $resolvedComplaint }}</p>
                </div>
                <div class="bg-orange-600 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">Rejected</p>
                    <p>{{ $rejectedComplaint }}</p>
                </div>
                <div class="bg-gray-700 text-white p-4 rounded-xl shadow-lg text-center">
                    <p class="text-xl font-bold">Canceled</p>
                    <p>{{ $canceledComplaint }}</p>
                </div>
            </div>
        </section>
        <section>
            {{-- @include('user.components.notifications') --}}
        </section>

    </div>

</body>

</html>
