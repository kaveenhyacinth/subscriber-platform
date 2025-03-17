<?php

    namespace Database\Factories;

    use App\Models\Website;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
     */
    class PostFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'title' => $this->faker->sentence(2),
                'slug' => $this->faker->slug,
                'content' => $this->faker->text,
                'website_id' => $this->faker->numberBetween(1, Website::count()),
            ];
        }
    }
