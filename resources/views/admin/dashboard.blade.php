
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
 <ul>
    <li>
        <a href="{{ route('complaint') }}">Complaint List</a>
    </li>
    <li>
        <!-- untuk logout gunakan ini -->
        <a href="{{ route('logout') }}">Logout</a>
    </li>
 </ul>

</body>
</html>