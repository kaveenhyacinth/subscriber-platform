<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            // User::factory(10)->create();

            User::factory()->create([
                'name' => 'Tom Smith',
                'email' => 'tom@example.com',
            ]);

            User::factory()->create([
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ]);

            User::factory()->create([
                'name' => 'Mary Jane',
                'email' => 'mary@example.com',
            ]);

            $this->call([
                WebsiteSeeder::class,
                PostSeeder::class,
                SubscriptionSeeder::class,
            ]);
        }
    }
