<button><a href="{{route('home')}}">๐ Accueil</a></button>
<button><a href="{{route('apropos')}}">โA propos</a></button>
<button><a href="{{route('contacts')}}">โ๏ธ Contacts</a></button>
@guest
    <button><a href="{{route('register')}}">๐ฅ Enregistrement</a></button>
    <div>
        <button><a href="{{route('login')}}">๐ Connexion</a></button>
    </div>
@endguest
@auth
    <button><a href="{{route('pokemons.index')}}">๐ Pokรฉmons</a></button>
    <div>
        {{Auth::user()->name}}
        <button><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
                <form method="POST" style="display: none;" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </a>
        </button>
    </div>
@endauth
