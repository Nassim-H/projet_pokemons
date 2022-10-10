<x-layout :titre="$titre">
    <h1>Modification d'une tâche</h1>

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

    <form action="{{route('pokemons.update',$pokemon->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="expiration">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       value="{{ $pokemon->nom }}">
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="categorie">Extension :</label>
                <input class="form-input" type="text" id="extension" name="extension"
                       value="{{$pokemon->extension}}">
            </div>

            <div class="form-control">
                <label class="form-label" for="categorie">Vie :</label>
                <input class="form-input" type="text" id="vie" name="vie"
                       value="{{$pokemon->vie}}">
            </div>

            <div class="form-control">
                <label class="form-label" for="categorie">Faiblesse :</label>
                <input class="form-input" type="text" id="faiblesse" name="faiblesse"
                       value="{{$pokemon->faiblesse}}">
            </div>
            {{-- effectuée --}}
            <div class="form-control">
                <label class="form-label" for="categorie">Type :</label>
                <input class="form-input" type="text" id="type" name="type"
                       value="{{$pokemon->type}}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="description">Degats :</label>
                <textarea class="form-input" name="degats" id="degats"
                          placeholder="Description..">{{ $pokemon->degats }}</textarea>
            </div>
            <div class="form-buttons">
                <button type="submit" name="action" value="Annule">Annule</button>
                <button type="submit" name="action" value="Valide">Valide</button>
            </div>
        </div>
    </form>

</x-layout>
