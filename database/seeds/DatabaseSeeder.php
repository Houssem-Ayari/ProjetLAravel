<?php

use Illuminate\Database\Seeder;
use App\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $this->call(MenuSeeder::class);

    }
}
