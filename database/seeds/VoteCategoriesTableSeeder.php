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
          ['name' => "The Most Effective Campaign", 'max' => 1, 'description' => "Ambassador communicated clearly the key messages of the attribute showed behaviors accordingly and made you feel want to change."],
          ['name' => 'The Best Value<br>Forward Compatible Role Model', 'max' => 2, 'description' => "The Ambassador who demonstrates his/her strong belief of Forward Compatible Attribute, demonstrated through his/her behaviors during the interaction and continuously to influence others to behave as per behaviors outlined by the guidelines."]
      ]);
    }
}
