<?php

namespace Database\Factories;
use App\Models\Pokemon;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokemon::class;

    private static $i = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $users_id = User::all()->pluck('id');
        return [

            'nom' => $this->faker->randomElement($array = array('Bardara', 'FlexFLix', 'Optiomus','CataC','CataV','Derigyt','Javart','Pyrcon')),
            'extension' => $this->faker->randomElement($array = array('Feu', 'Eau', 'Fumée', 'Pierre')),
            'vie' => $this->faker->numberBetween(0,100),
            'type' => $this->faker->randomElement($array = array('Homme', 'Dragon', 'Objet', 'Carnivore')),
            'faiblesse' => $this->faker->randomElement($array = array('Feu', 'Eau', 'Fumée', 'Pierre')),
            'degats' => $this->faker->numberBetween(0,100),
            'user_id' => $this->faker->randomElement($users_id),

        ];

    }
}
