<?php

namespace Database\Factories;
use App\Models\Pokemon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {

        return [

            'nom' => $this->faker->randomElement($array = array('Bardara', 'FlexFLix', 'Optiomus','CataC','CataV','Derigyt','Javart','Pyrcon')),
            'extension' => $this->faker->randomElement($array = array('Feu', 'Eau', 'Fumée', 'Pierre')),
            'vie' => $this->faker->numberBetween(0,100),
            'type' => $this->faker->randomElement($array = array('Homme', 'Dragon', 'Objet', 'Carnivore')),
            'faiblesse' => $this->faker->randomElement($array = array('Feu', 'Eau', 'Fumée', 'Pierre')),
            'degats' => $this->faker->numberBetween(0,100),

        ];

    }
}
