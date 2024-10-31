<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $card_listings = include database_path('seeders/data/card_listings.php');

        $usersId = User::pluck('id')->toArray();

        foreach ($card_listings as &$listing) {
            $listing['user_id'] = $usersId[array_rand($usersId)];

            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        DB::table('card_listings')->insert($card_listings);
        echo 'Cards created successfully!!';
    }
}
