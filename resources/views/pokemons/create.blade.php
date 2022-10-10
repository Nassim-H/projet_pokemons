<x-layout :titre="$titre">
    <h1>Création d'une tâche</h1>

    {{--
       messages d'erreurs dans la saisie du formulaire.
    --}}

    @if ($errors->any())
        <div class="errors">
            <h3 class="titre-erreurs">Liste des erreurs</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--
         formulaire de saisie d'une tâche
         la fonction 'route' utilise un nom de route
         'csrf_field' ajoute un champ caché qui permet de vérifier
           que le formulaire vient du serveur.
      --}}

    <form action="{{route('pokemons.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="nom">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       value="{{ old('Nom') }}">
            </div>

            <div class="form-control">
                <label class="form-label" for="extension">Extension :</label>
                <input class="form-input" type="text" id="extension" name="extension"
                       value="{{ old('Extension') }}">
            </div>

            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="vie">Vie :</label>
                <input class="form-input" type="text" id="vie" name="vie"
                       value="{{ old('Vie') }}">
            </div>
            {{-- effectuée --}}
            <div class="form-control">
                <label class="form-label" for="type">Type :</label>
                <input class="form-input" type="text" id="type" name="type"
                       value="{{ old('Type') }}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="faiblesse">Faiblesse :</label>
                <textarea class="form-input" name="faiblesse" id="faiblesse"
                          placeholder="Faiblesses..">{{ old('Faiblesse') }}</textarea>
            </div>

            <div class="form-control">
                <label class="form-label" for="degats">Dégâts :</label>
                <textarea class="form-input" name="degats" id="degats"
                          placeholder="Dégâts..">{{ old('Dégâts') }}</textarea>
            </div>
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>

</x-layout>
