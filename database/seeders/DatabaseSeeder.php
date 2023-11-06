<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cars;
use App\Models\User;
use App\Models\CarModels;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $user=User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password'=>'123123',
            'phone'=>'+1320352-3907'
        ]);  
        $user->assignRole('admin');
        Cars::factory()->count(3)->create();
        CarModels::factory()->create([
            'company'=>'BMW',
            'model'=>'M3',
        ]);
        
    }
}
