<x-layout :titre="$titre">
    @if($action == 'delete')
        <h3>Suppression d'une tâche</h3>
    @else
        <h3>Affichage d'une tâche</h3>
    @endif
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>nom</th>
                <th>extension</th>
                <th>vie</th>
                <th>type</th>
                <th>faiblesses</th>
                <th>degats</th>
            </tr>
            </thead>
            <tbody>

                <tr style="width: 100%">
                    <td>{{$pokemon->id}}</td>
                    <td>{{$pokemon->nom}}</td>
                    <td>{{$pokemon->extension}}</td>
                    <td>{{$pokemon->vie}}</td>
                    <td>{{$pokemon->type}}</td>
                    <td>{{$pokemon->faiblesses}}</td>
                    <td>{{$pokemon->degats}}</td>
                </tr>
            </tbody>
        </table>
        <div class="image">
            <img src="{{url('storage/'.$pokemon->url_media)}}" alt="image pokémon">
        </div>

        @if($action == 'delete')
            @can('delete',$pokemon)
                <form action="{{route('pokemons.destroy',$pokemon->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <button type="submit" name="delete" value="valide">Valide</button>
                        <button type="submit" name="delete" value="annule">Annule</button>
                    </div>
                </form>
            @endcan
        @endif
            <div>
                <a href="{{route('pokemons.index')}}">Retour à la liste</a>
            </div>

</x-layout>
