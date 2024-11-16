<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Responsif</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div x-data="{ open: false, setTitle(title) { document.title = title; } }" class="flex max-h-max">
        <!-- Sidebar content -->
        <div :class="{ 'w-64': open, 'w-16': !open }"
            class="bg-indigo-600 text-white transition-all duration-300 h-full p-4">
            <!-- Sidebar Toggle Button (for small screens) -->
            <button @click="open = !open" class="lg:hidden text-white mb-4">
                <i :class="{ 'fa-chevron-left': open, 'fa-chevron-right': !open }"
                    class="fas fa-2x transition-transform duration-300"></i>
            </button>

            <!-- Menu items -->
            <ul class="mt-6 space-y-4">
                <li>
                    <a href="#" @click="setTitle('Dashboard')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-tachometer-alt w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="setTitle('Pengaduan')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-flag w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="setTitle('Riwayat')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-history w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Riwayat</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="setTitle('Pesan')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-comments w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="setTitle('Profil')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-user w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="setTitle('Logout')"
                        class="flex items-center space-x-2 hover:bg-indigo-700 p-2 rounded transition-all">
                        <i class="fas fa-sign-out-alt w-5 h-5"></i>
                        <span :class="{ 'hidden': !open }" class="block">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content Area -->

    </div>

</body>

</html>
