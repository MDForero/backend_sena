<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Material;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1000)->create();
        Article::factory(1000)->create();
        Material::factory(1000)->create();
        DB::table('users')->insert([
            'id'=> fake()->uuid(),
            'nit'=>'1116803258',
            'name'=>'admin',
            'email'=> 'prueba@prueba.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'=> 'admin',
            'remember_token'=> Str::random(10),
            'status'=> 'authorized',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
