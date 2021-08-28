<?php
namespace App\Seeder;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => "admin@gmail.com",
            'password' => Hash::make("Abc@12345678"),
            'name' => "admin",
            'phone' => '09810000'
        ]);
    }
}
