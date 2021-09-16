<?php
use  App\Seeder\UserSeeder;
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
        $this->call(UserSeeder::class);
        // User::insert([
        //     'email' => "admin@gmail.com",
        //     'password' => Hash::make("Abc@12345678"),
        //     'name' => "admin",
        //     'phone' => '09810000'
        // ]);

    }
}
