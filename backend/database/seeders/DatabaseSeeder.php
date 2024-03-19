<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::factory()->admin()->create([
            'full_name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'contact' => 9456784158,
            'password' => bcrypt('admin@1234')
        ]);
        
        User::factory()->count(5)->create();
    }
}
