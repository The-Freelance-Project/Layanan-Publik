
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

<h1>HALAMAN COMPLAINT LIST ADMIN</h1>

<br><br>

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

 <br><br>

<!-- Set Alert biar muncul kalo error -->
@include('components.alert')


<br><br>
<!-- ini buat filter Complaint nya -->

<form action="" method="get">
    @csrf
    <h1>Filter Complaint</h1>
    <div>
        <label for="status">Filter By Status</label>
        <select name="status" id="status">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progres" {{ request('status') == 'in_progres' ? 'selected' : '' }}>Dalam Proses</option>
            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Selesai</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
        </select>
    </div>
    <br>
    <h1>Filter By Tanggal</h1>
    <div class="flex space-x-4">
        <div>
            <label for="start_date">Dari Tgl</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">
        </div>
        <div>
            <label for="end_date">Hingga Tgl</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">
        </div>
    </div>
    <div class="flex space-x-4 mt-2">
        <button type="submit" class="border border-black rounded px-4 py-2">Filter Complaint</button>
        <a href="{{ url()->current() }}" class="border border-red-500 text-red-500 rounded px-4 py-2">Reset Filter</a>
    </div>
</form>



<br><br>


<!-- ini tabel Complaint nya -->
<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($complaints as $complaint)
            
        <tr>
            <td>{{ $complaint->title }}</td>
            <td class="px-4">{{ $complaint->category->name }}</td>
            <td>{{ $complaint->created_at }}</td>
            <td class="px-4">{{ $complaint->status }}</td>
            <td>
                <a href="{{ route('complaint.view.admin', ['id' => $complaint->id]) }}">Lihat</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>


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