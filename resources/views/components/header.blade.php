<button><a href="{{route('home')}}">🏛 Accueil</a></button>
<button><a href="{{route('apropos')}}">❔A propos</a></button>
<button><a href="{{route('contacts')}}">☎️ Contacts</a></button>
@guest
    <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
    <div>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
    </div>
@endguest
@auth
    <button><a href="{{route('pokemons.index')}}">📜 Pokémons</a></button>
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
