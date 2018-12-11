<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=3; $i<=6; $i++){
        $loop = rand (10, 90);
        for($j=0; $j<=$loop; $j++){
          Vote::insert([
              ['user_id' => $i, 'vote_category_id' => 1, 'candidate_id' => rand(7,12)]
          ]);
        }
        $loop2 = rand (10, 90);
        for($j=0; $j<=$loop; $j++){
          Vote::insert([
              ['user_id' => $i, 'vote_category_id' => 2, 'candidate_id' => rand(7,12)]
          ]);
        }
      }
    }
}
