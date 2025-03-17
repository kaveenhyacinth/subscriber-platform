<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class SubscriptionSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $data = [];

            for ($i = 1; $i < 4; $i++) {
                $data[] = [
                    'user_id' => 1,
                    'website_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            DB::table('subscriptions')->insert($data);
        }
    }
