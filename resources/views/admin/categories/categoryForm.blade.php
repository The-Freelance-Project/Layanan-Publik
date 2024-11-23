
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

<h1>HALAMAN ADMIN FORM TAMBAH dan EDIT CATEGORY</h1>

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


<!-- Ini Form Create Category nya -->
<form action="{{ route('category.add') }}" method="post">
    @csrf
    <div>
        <label for="name">Nama Kategory</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
    </div>
    <div>
        <label for="description"></label>
        <textarea name="description" id="description">{{ $category->description }}</textarea>
    </div>
    <div>
        <button type="submit">Submit Kategori Form</button>
    </div>
</form>

</body>
</html>