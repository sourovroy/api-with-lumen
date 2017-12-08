<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(App\User::class, 2)->create();
        factory(App\Post::class, 50)->create();
        factory(App\Comment::class, 100)->create();
    }
}
