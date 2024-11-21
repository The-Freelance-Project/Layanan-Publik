
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

<!-- Set Alert biar muncul kalo error -->
@include('components.alert')

<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($complaints as $complaint)
            
        <tr>
            <td>{{ $complaint->title }}</td>
            <td>{{ $complaint->category->name }}</td>
            <td>{{ $complaint->status }}</td>
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