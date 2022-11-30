<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name'=> 'admin',
        //     'email'=> 'admin@mail.com',
        //     'password'=> Hash::make('admin@mail.com'),
        //     'role'=> 'admin',
        // ]);

        User::create([
            'name'=> 'admin',
            'email'=> 'admin@mail.com',
            'password'=> Hash::make('admin@mail.com'),
            'role'=> 'admin',
        ]);
        User::create([
            'name'=> 'editor',
            'email'=> 'editor@mail.com',
            'password'=> Hash::make('editor@mail.com'),
            'role'=> 'editor',
        ]);
        Kategori::create([
            'nama_kategori'=> 'Kategori 1',
        ]);
        Kategori::create([
            'nama_kategori'=> 'Kategori 2',
        ]);
    }
}
