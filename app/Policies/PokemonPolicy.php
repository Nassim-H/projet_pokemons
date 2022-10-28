<?php

namespace App\Policies;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PokemonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    function update(User $user, Pokemon $pokemon) {
        return $user->id === $pokemon->user_id;
    }

    function delete(User $user, Pokemon $pokemon) {
        return $user->id === $pokemon->user_id;
    }

    function create(User $user) {
        return true;
    }

    function edit(User $user, Pokemon $pokemon){
        return $user->id === $pokemon->user_id;
    }
}
