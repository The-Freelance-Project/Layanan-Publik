
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
    @php
    setlocale(LC_TIME, 'id_ID.utf8');
    @endphp

<ul class="p-5">

    @foreach ($historyComplaint as $history)
        
        <li class="w-full max-w-sm p-2 border border-black rounded my-2">
            <div>Judul Pengaduan: {{ $history['title'] }}</div>
            <div>Dibuat Pada: {{ date('l, d F Y', strtotime($history['created_at'])) }}</div>
            <div>Status Terakhir: {{ $history['status'] }}</div>
            <a href="{{ $history['url'] }}" class="underline bg-green-200">Lihat Pengaduan</a>
        </li>

    @endforeach
</ul>


</body>
</html>