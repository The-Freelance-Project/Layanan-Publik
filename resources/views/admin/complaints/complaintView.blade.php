
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

<h1>HALAMAN COMPLAINT VIEW BYID ADMIN</h1>

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

<ul>
    <li>Aduan Dari : {{ $complaint->user->name }}</li>
    <li>Kategori : {{ $complaint->category->name }}</li>
    <li>Judul : {{ $complaint->title }}</li>
    <li>Deskripsi : {{ $complaint->description }}</li>
    <li>Lokasi : {{ $complaint->location }}</li>
    <li>Status : {{ $complaint->status }}</li>
    <li>Url Foto : {{ $complaint->photo }}</li>
</ul>

<br>
<h1>Proses Aduan Ini</h1>

<form action="{{ route('complaint.process', ['id' => $complaint->id]) }}" method="post">
    @csrf
    <select name="status">
        <option value="pending">Pending</option>
        <option value="in_progress">Proses Aduan</option>
        <option value="resolved">Aduan Telah Selesai</option>
        <option value="rejected">Tolak Aduan</option>
        <option value="canceled">Batalkan Aduan</option>
    </select>
    <br>
    <br>
    <div>
        <label for="">Catatan</label>
        <textarea name="note" id=""></textarea>
    </div>
    <br>
    <button type="submit">Proses Aduan Ini</button>
</form>

<br>
<h1>History</h1>
@foreach ($complaint->complaintHistory as $statusHistory)
    <div
        class="flex items-start bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
        <i class="fas fa-user-circle text-gray-600 text-3xl mr-4"></i>
        <div>
            <p class="text-gray-700"><span class="font-semibold">Dibuat Oleh:</span>
                {{ $statusHistory->changedBy->name }}</p>
            <p class="text-gray-700"><span class="font-semibold">Date:</span>
                {{ $statusHistory->created_at }}</p>
            <p class="text-gray-700"><span class="font-semibold">Status:</span>
                {{ $statusHistory->status }}</p>
            <p class="text-gray-700"><span class="font-semibold">Catatan:</span>
                {{ $statusHistory->note }}
            </p>
        </div>
    </div>
@endforeach

<!-- Add and Display Comments -->
<section class="bg-white text-gray-800 rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-4 flex items-center space-x-2">
        <i class="fas fa-comments"></i>
        <span>Comments</span>
    </h2>
    <form action="{{ route('response.add.admin') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
        <textarea name="response_text" rows="4"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
            placeholder="Write your comment here..."></textarea>
        <button type="submit"
            class="bg-gray-800 text-white px-6 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition duration-200">
            <i class="fas fa-paper-plane"></i>
            <span>Submit Comment</span>
        </button>
    </form>
    <div class="space-y-4 mt-6">
        @foreach ($complaint->responses as $response)
            <div
                class="flex items-start bg-gray-50 p-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <i class="fas fa-user-circle text-gray-600 text-3xl mr-4"></i>
                <div>
                    <p class="font-medium text-gray-700">{{ $response->user->name }}</p>
                    <p class="text-gray-600">{{ $response->response_text }}</p>

                </div>
            </div>
        @endforeach
    </div>
</section>

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