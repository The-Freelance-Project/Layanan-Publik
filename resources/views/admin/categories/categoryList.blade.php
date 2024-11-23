
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

<h1>HALAMAN CATEGORY LIST ADMIN</h1>

<br><br>

<a href="{{ route('category.form') }}" class="p-1 border border-black rounded">Buat Kategori Batu</a>

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

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($categories as $category)
            
        <tr>
            <td>{{ $category->name }}</td>
            <td class="px-4">{{ $category->description }}</td>
            <td class="flex space-x-2">
                <a href="{{ route('category.form', ['id' => $category->id]) }}">Edit</a>
                <a href="{{ route('category.delete', ['id' => $category->id]) }}">Hapus Kategori</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

</body>
</html>