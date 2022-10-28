<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class PokemonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() {
        $pokemons = Pokemon::all();
        return view('pokemons.index-comp', ['titre' => "Liste des Pokémons", 'pokemons' => $pokemons]);
    }


    public function indexCookie(Request $request): View {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $pokemons = Pokemon::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $pokemons = Pokemon::where('categorie', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);
            }
        } else {
            if ($cat == 'All') {
                $pokemons = Pokemon::all();
                Cookie::expire('cat');
            } else {
                $pokemons = Pokemon::where('categorie', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $faiblesses = Pokemon::distinct('faiblesse')->pluck('faiblesse');
        return view('pokemons.index-comp', ['titre' => "Liste des Pokemons", 'pokemons' => $pokemons, 'cat' => $cat, 'faiblesses' => $faiblesses]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View {
        return view('pokemons.create', ['titre' => "Création d'un pokémon"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {
        // validation des données de la requête

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'extension' => 'required',
                'vie' => 'required',
                'type' => 'required',
                'faiblesse' => 'required',
                'degats' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $pokemon = new Pokemon;

        $pokemon->nom = $request->nom;
        $pokemon->extension = $request->extension;
        $pokemon->vie = $request->vie;
        $pokemon->type = $request->type;
        $pokemon->faiblesse = $request->faiblesse;
        $pokemon->degats = $request->degats;
        $pokemon->user_id = $request->id_user;

        // insertion de l'enregistrement dans la base de données
        $pokemon->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect()->route('pokemons.index', ['titre' => "Liste des pokémons"]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pokemon $pokemon
     * @return View
     */
    public function show(Request $request, int $id): View {
        $action = $request->query('action', 'show');
        $pokemon = Pokemon::findOrFail($id);

        return view('pokemons.show', ['pokemon' => $pokemon, 'titre' => 'Un pokémon', 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pokemon $tache
     * @return View
     */
    public function edit(int $id): View {
        $pokemon = Pokemon::find($id);
        $this->authorize('edit', $pokemon);
        return view('pokemons.edit', ['pokemon' => $pokemon, 'titre' => "Modification d'un pokémon"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse {
        $pokemon = Pokemon::find($id);
        $this->authorize('update', $pokemon);
        // validation des données de la requête
            $this->validate(
                $request,
                [
                    'nom' => 'required',
                    'extension' => 'required',
                    'vie' => 'required',
                    'type' => 'required',
                    'faiblesse' => 'required',
                    'degats' => 'required',
                    ],
                [
                    'required' => 'Le champ :attribute est obligatoire'
                ]
            );

            // code exécuté uniquement si les données sont validées
            // sinon un message d'erreur est renvoyé vers l'utilisateur

            // préparation de l'enregistrement à stocker dans la base de données

            $pokemon->nom = $request->nom;
            $pokemon->extension = $request->extension;
            $pokemon->vie = $request->vie;
            $pokemon->type = $request->type;
            $pokemon->degats = $request->degats;
            $pokemon->faiblesse = $request->faiblesse;
            if (isset($request->effectuee) && $request->effectuee == "on")
                $pokemon->effectuee = 1;
            else
                $pokemon->effectuee = 0;

            // insertion de l'enregistrement dans la base de données
            $pokemon->update();

            // redirection vers la page qui affiche la liste des tâches
            return redirect()->route('pokemons.index', ['titre' => "Liste des pokémons"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Pokemon $pokemon
     * @return RedirectResponse
     */
    public function destroy(Request $request, int $id) {
        if ($request->delete == 'valide') {
            $pokemon = Pokemon::find($id);
            $this->authorize('destroy', $pokemon);
            $pokemon->delete();
        }
        return redirect()->route('pokemons.index');
    }

    function storeJson(Request $request) {
        return response()->json([
                'method' => $request->getMethod(),
                'uri' => $request->getUri(),
                'uriPath' => $request->getUri(),
                'queryParameters' => $request->getQueryString(),
                'body' => $request->all(),
                'cookies' => $request->cookies,
            ]
        );
    }
}
