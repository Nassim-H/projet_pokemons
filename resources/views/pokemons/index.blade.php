<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des</title>
</head>
<body>

<h1>Liste des tâches</h1>
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
</body>
</html>
