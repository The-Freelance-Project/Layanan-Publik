
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

<h1>HALAMAN LIHAT 1 COMPLAINT</h1>
<p>file: resources/views/user/complaints/complaintView.blade.php</p>

<br><br>

    <!-- Set Alert biar muncul kalo error atau notifikasi sukses -->
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

    <br>

    <div class="border">

        <h1>Complaint View</h1>
        <h2>Category: {{ $complaint->category->name }}</h2>
        <h2>Title: {{ $complaint->title }}</h2>
        <h2>description: {{ $complaint->description }}</h2>
        <h2>status: {{ $complaint->status }}</h2>
    
    </div>

    <br>

    <h1>Complaint Status History</h1>
    
    @foreach ($complaint->complaintHistory as $statusHistory)    
        <h2>Tanggal: {{ $statusHistory->created_at }}</h2>
        <h2>Status Complaint: {{ $statusHistory->status }}</h2>
        <h2>Oleh: {{ $statusHistory->changedBy->name }}</h2>
    @endforeach


    <br>

    <h1>Complaint Response</h1>
    <!-- Add Response -->
     <form action="{{ route('response.add') }}" method="POST">
        @csrf
        <div>
            <label for="">Response Text</label>
            <textarea name="response_text"></textarea>
        </div>
        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
        <input type="submit" value="Kirim Response Baru">
     </form>

     <br>

     <h1>List Response of Complaint</h1>
     @foreach ($complaint->responses as $response)
         <h2>Dari : {{ $response->user->name }}</h2>
         <h2>Response Text : {{ $response->response_text }}</h2>
     @endforeach
    
    </body>
    </html>