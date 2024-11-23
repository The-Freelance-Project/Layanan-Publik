
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Set TailwindCss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<h1>HALAMAN DASHBOARD ADMIN</h1>
<p>file: resources/views/admin/dashboard.blade.php</p>

<br><br>

<!-- Set Alert biar muncul kalo error -->
@include('components.alert')

<!-- ambil data user -->
 @php
 $user = Auth::user(); 
 @endphp

<!-- Menampilkan data user -->
 {{ $user->name }}
 <br>
 {{ $user->email }}

 <br>
 <br>

  <!-- Navigasi -->
  <ul class="w-full flex space-x-4 px-4">

    <li class="p-1 border border-black rounded">
        <a href="{{ route('complaint.admin') }}">Complaint List</a>
    </li>

    <li class="p-1 border border-black rounded">
        <a href="{{ route('category.list') }}">Category List</a>
    </li>

    <li class="p-1 border border-black rounded">
        <a href="{{ route('profile') }}">Profile</a>
    </li>

    <li class="p-1 border border-black rounded">
        <!-- untuk logout gunakan ini -->
        <a href="{{ route('logout') }}">Logout</a>
    </li>

    <li class="p-1 border border-black rounded">
        <a href="{{ redirect()->back() }}">Kembali</a>
    </li>

 </ul>

 <br>

 <div class="w-full grid grid-cols-3 gap-3 mb-5">
    <div class="p-2 border border-black rounded">Total Complaint {{ $totalComplaint }}</div>
    <div class="p-2 border border-black rounded">Pending Complaint {{ $pendingComplaint }}</div>
    <div class="p-2 border border-black rounded">In Progress Complaint {{ $inProgressComplaint }}</div>
    <div class="p-2 border border-black rounded">Resolved Complaint {{ $resolvedComplaint }}</div>
    <div class="p-2 border border-black rounded">Rejected Complaint {{ $rejectedComplaint }}</div>
    <div class="p-2 border border-black rounded">Canceled Complaint {{ $canceledComplaint }}</div>
 </div>



</body>
</html>