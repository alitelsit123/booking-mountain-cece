<?php

use Illuminate\Database\Seeder;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::whereEmail('admin@gmail.com')->delete();
      $user = User::firstOrCreate([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => \bcrypt('12345678'),
        'nik' => '123456789',
        'role' => 'admin'
      ]);
    }
}
