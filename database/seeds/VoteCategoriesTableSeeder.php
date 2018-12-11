<?php

use Illuminate\Database\Seeder;
use App\Models\VoteCategory;

class VoteCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      VoteCategory::insert([
          ['name' => "Most Effective Ambassador&#x27;s Campaign", 'max' => 1, 'description' => "Ambassador communicated clearly the key messages of the attribute showed behaviors accordingly and made you feel want to change."],
          ['name' => 'Most Favorite Ambassador', 'max' => 2, 'description' => "Ambassador&#x27;s campaign activities delivered in creative, fun and memorable ways."]
      ]);
    }
}
