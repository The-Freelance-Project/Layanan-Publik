
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
        
<h1>HALAMAN TAMBAH COMPLAINT</h1>
<p>file: resources/views/user/complaints/complaintForm.blade.php</p>

<br><br>


    <!-- Set Alert biar muncul kalo error -->
    @include('components.alert')
    <br>

    <!-- ambil data user -->
    @php
    $user = Auth::user(); 
    @endphp


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

    <form action="{{ route('complaint.add') }}" method="POST">

        @csrf
        <div>
            <label for="">Category</label>
            <select name="category" >
                <!-- Tampilkan semua kategory yang ada di database -->
                @foreach ($categories as $category)
                
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                
                @endforeach
            </select>
        </div>

        <div>
            <label for="">Title</label>
            <input type="text" name="title">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description"></textarea>
        </div>
        
        <input type="submit">

    </form>


    
    </body>
    </html>