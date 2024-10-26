<!-- SETUP ALERT NOTIFIKASI ERROR ATAU SUKSES -->

<!-- Menampilkan Pesan Sukses -->
@if(session('message'))

    <div>{{ session('message') }}.</div>
        
@endif

<!-- Menampilkan pesan errors -->
@if(session('error'))

    <div>{{ session('error') }}.</div>
    
@endif

<!-- Menampilkan Pesan Error Juga tapi banyak-->
@if ($errors->any())

        @foreach ($errors->all() as $error)
            <span>Error!</span> {{ $error }}.
        @endforeach

@endif
