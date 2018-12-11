<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
          ['name' => 'Administrator', 'role_id' => 1, 'soeid' => null,  'email' => 'admin@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Member 1', 'role_id' => 2, 'soeid' => 'mb-1', 'email' => 'member1@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Member 2', 'role_id' => 2, 'soeid' => 'mb-2', 'email' => 'member2@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Member 3', 'role_id' => 2, 'soeid' => 'mb-3', 'email' => 'member3@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Member 4', 'role_id' => 2, 'soeid' => 'mb-4', 'email' => 'member4@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Member 5', 'role_id' => 2, 'soeid' => 'mb-5', 'email' => 'member5@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => null, 'nickname' => null, 'description' => null ],
          ['name' => 'Candidate 1', 'role_id' => 3, 'soeid' => 'cd-1', 'email' => 'candidate1@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_1.png', 'nickname' => 'Adaptable', 'description' => 'Calm, optimistic and comfortable dealing with uncertainty and change.' ],
          ['name' => 'Candidate 2', 'role_id' => 3, 'soeid' => 'cd-2', 'email' => 'candidate2@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_2.png', 'nickname' => 'Bold', 'description' => 'Has courage to fail and set a high bar.' ],
          ['name' => 'Candidate 3', 'role_id' => 3, 'soeid' => 'cd-3', 'email' => 'candidate3@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_3.png', 'nickname' => 'Collaborative', 'description' => 'Challange traditional approaches, ask questions and brings outside perspectives' ],
          ['name' => 'Candidate 4', 'role_id' => 3, 'soeid' => 'cd-4', 'email' => 'candidate4@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_4.png', 'nickname' => 'Curious', 'description' => 'Strong partnering skillsm Inclusive of and values diverse perspectives' ],
          ['name' => 'Candidate 5', 'role_id' => 3, 'soeid' => 'cd-5', 'email' => 'candidate5@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_5.png', 'nickname' => 'Determinded', 'description' => 'Persistent and resilient to setbacks and failures' ],
          ['name' => 'Candidate 6', 'role_id' => 3, 'soeid' => 'cd-6', 'email' => 'candidate6@citivote.com', 'password' => bcrypt('nalarnaluri'), 'image' => 'candidate_6.png', 'nickname' => 'Empathetic', 'description' => "Puts aside own viewpoints to see things from another&#x27;s perspective" ],
      ]);
    }
}
