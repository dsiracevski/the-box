<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sentence>
 */
class SentenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $keyword = $this->faker->word();

        $sentence = $this->faker->sentence()
            . " "
            . $keyword
            . " "
            . $this->faker->sentence();

        return [
            'body' => $sentence,
            'keyword' => $keyword,
            'author_id' => User::inRandomOrder()->first()->id
        ];
    }
}
