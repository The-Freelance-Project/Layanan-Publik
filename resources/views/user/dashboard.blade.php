User Dashboard

{{ Auth::user()->name }}


<!-- untuk logout gunakan ini -->

<a href="{{ route('logout') }}">Logout</a>