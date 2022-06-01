<?php

namespace Database\Seeders;

use App\Models\CashIn;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       User::create([
           'name'   => 'Shadhin',
           'email'  => 'a@ida.com',
           'password'   => bcrypt('123'),
           'role'   => 'admin',
       ]);

       CashIn::factory(100)->create();
    }
}
