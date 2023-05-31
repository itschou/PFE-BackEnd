<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use App\Models\Fournisseur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        Fournisseur::factory(20)->create();

        \App\Models\User::factory()->create([
            'nom' => 'Test User',
            'telephone' => '090900909',
            'adresse' => 'TEST ADRESS',
            'role' => 'entreprise',
            'email' => 'test@test.com',
            'password' => Hash::make('test')
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Chouaib',
            'telephone' => '0666237283',
            'adresse' => '2 rue des espoires , Paris',
            'role' => 'admin',
            'email' => 'a@a.com',
            'password' => Hash::make('test')
        ]);
    }
}