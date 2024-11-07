<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('card_user_bookmarks')->delete();
        DB::table('card_listings')->delete();
        DB::table('users')->delete();


        $this->call(TestUserSeeder::class);
        $this->call(RandomUserSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(BookmarkSeeder::class);
    }
}
