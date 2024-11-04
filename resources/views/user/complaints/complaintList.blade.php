
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

<!-- Set Alert biar muncul kalo error -->
@include('components.alert')
<br>

<h1>HALAMAN COMPLAINT LIST</h1>
<p>file: resources/views/user/complaints/complaintList.blade.php</p>

<br><br>

<!-- ambil data user -->
 @php
 $user = Auth::user(); 
 @endphp

Halaman List Complaint

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

 <a href="{{ route('complaint.form') }}">Tambahkan Komplain</a>

    <!-- Menampilkan data Complaint user -->
    <table>
        <thead class="border">
            <tr>
                <td>No</td>
                <td>Category</td>
                <td>Title</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $key => $complaint)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $complaint->category->name }}</td>
                <td>{{ $complaint->title }}</td>
                <td>{{ $complaint->status }}</td>
                <td>
                    <a href="{{ route('complaint.view', ['id' => $complaint->id]) }}">View</a>
                    <a href="">Delete</a>
                    <a href="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>