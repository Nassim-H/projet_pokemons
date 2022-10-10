<x-layout :titre="$titre">
    <div class="entete">
        <h1>Liste des Pokémons</h1>
        <button class="aDroite"><a href="{{route('pokemons.create')}}">Ajouter</a></button>
    </div>
    @if(!empty($pokemons))
        <form action="{{route('pokemons.index')}}" method="get">
            <select name="cat">
                <option value="All" @if($cat == 'All') selected @endif>-- Tous types --</option>
                @foreach($faiblesses as $faiblesse)
                    <option value="{{$faiblesse}}" @if($cat == $faiblesse) selected @endif>{{$faiblesse}}</option>
                @endforeach
            </select>
            <input type="submit" value="OK">
        </form>



        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Extension</th>
                <th>Vie</th>
                <th>Type</th>
                <th>Faiblesses</th>
                <th>Degats</th>

            </tr>


            </thead>
            <HR ALIGN=CENTER WIDTH="1800">

            <tbody>

            @foreach($pokemons as $pokemon)
                <tr>

                    <td>{{$pokemon->id}}</td>
                    <td>{{$pokemon->nom}}</td>
                    <td>{{$pokemon->extension}}</td>
                    <td>{{$pokemon->vie}}</td>
                    <td>{{$pokemon->type}}</td>
                    <td>{{$pokemon->faiblesses}}</td>
                    <td>{{$pokemon->degats}}</td>

                    <td>{{$pokemon->effectuee ? "👍": "👎" }}</td>
                    <td>
                        <a href="{{route('pokemons.show', ['tach'=>$pokemon->id])}}">🧾</a>
                        <a href="{{route('pokemons.edit', ['tache'=>$pokemon->id])}}">📝</a>
                        <a href="{{route('pokemons.show', ['tach'=>$pokemon->id, 'action'=>'delete'])}}">❌</a>
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>

    @else
        <h3>Aucune tâches dans la  ...</h3>
    @endif
</x-layout>
