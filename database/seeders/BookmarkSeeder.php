<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // test user
        $testUser = User::where('email', 'test@test.com')->firstOrFail();

        $jobsIds = Card::pluck('id')->toArray();

        $randomJobIds = array_rand($jobsIds, 3);

        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedCard()->attach($jobsIds[$jobId]);
        }
    }
}
