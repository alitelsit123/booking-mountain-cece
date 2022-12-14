<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Info;
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
      Info::query()->delete();
      Info::create(['price' => 10000,'name' => 'Budheg','book_limit' => 50]);
    }
}
