<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::insert([
          ['name' => 'admin'],
          ['name' => 'member'],
          ['name' => 'candidate']
      ]);
    }
}
