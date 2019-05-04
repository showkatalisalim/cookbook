@php($w3BarAlwaysItemClasses = 'w3-bar-item w3-button w3-padding-large')
@php($w3BarLargeItemClasses  = 'w3-bar-item w3-button w3-hide-small w3-padding-large')
@php($w3BarSmallItemClasses  = 'w3-bar-item w3-button w3-padding-large')

<div class="nav top">
    <div class="w3-bar w3-black">
        <a href="{{ url('/') }}" class="{{ $w3BarAlwaysItemClasses }}"><i class="home"></i>Rezepte</a>
        <a href="{{ url('/search') }}" class="{{ $w3BarAlwaysItemClasses }}"><i class="magnifier"></i>Suche</a>
        @auth
            <a href="{{ url('/recipes/create') }}" class="{{ $w3BarLargeItemClasses }}">Rezept eingeben</a>
        @endauth
        @if (auth()->check() && auth()->user()->isAdmin())
            <a href="{{ url('/admin') }}" class="{{ $w3BarLargeItemClasses }}">Administration</a>
        @endif

        @guest
            <a href="{{ route('login') }}" class="{{ $w3BarLargeItemClasses }} w3-right w3-grey"><i></i>Login</a>
        @else
            <a href="{{ url('/profile') }}" class="{{ $w3BarLargeItemClasses }} w3-right">Profil</a>

            <form id="logout-form" action="{{ route('logout') }}" class="w3-hide-small w3-right" method="POST">
                @csrf
                <input type="submit" value="Abmelden" class="w3-button">
            </form>
        @endguest

        <a href="javascript:void(0)" class="{{ $w3BarSmallItemClasses }} w3-right w3-hide-large w3-hide-medium" onclick="navigation()">&#9776;</a>
    </div>

    <div class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium mobile">
        @auth
            <a href="{{ url('/recipes/create') }}" class="{{ $w3BarSmallItemClasses }}">Rezept eingeben</a>
        @endauth
        @if (auth()->check() && auth()->user()->isAdmin())
            <a href="{{ url('/admin') }}" class="{{ $w3BarSmallItemClasses }}">Administration</a>
        @endif

        @guest
            <a href="{{ route('login') }}" class="{{ $w3BarSmallItemClasses }} w3-grey"><i></i>Login</a>
        @else
            <a href="{{ url('/profile') }}" class="{{ $w3BarSmallItemClasses }}">Profil</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <input type="submit" value="Abmelden" class="w3-button">
            </form>
        @endguest
    </div>
</div>

<script>
    function navigation() {
        $('.mobile').toggleClass('w3-show');
    }
</script>
