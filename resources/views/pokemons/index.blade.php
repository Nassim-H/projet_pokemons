<x-layout : titre="$titre">
<h4>Filtrage par catégorie</h4>
<form action="{{route('pokemons.index')}}" method="get">
    <select name="cat">
        <option value="All" @if($cat == 'All') selected @endif>-- Tout types --</option>
        @foreach($types as $type)
            <option value="{{$type}}" @if($cat == $type) selected @endif>{{$type}}</option>
        @endforeach
    </select>
    <input type="submit" value="OK">
</form>

@if(!empty($pokemons))

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
        @foreach($pokemons as $pokemon)
            <tr>
                <td>{{$pokemon->id}}</td>
                <td>{{$pokemon->nom}}</td>
                <td>{{$pokemon->extension}}</td>
                <td>{{$pokemon->vie}}</td>
                <td>{{$pokemon->type}}</td>
                <td>{{$pokemon->faiblesses}}</td>
                <td>{{$pokemon->degats}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h3>Aucune âme dans la table ...</h3>
@endif
</x-layout>
