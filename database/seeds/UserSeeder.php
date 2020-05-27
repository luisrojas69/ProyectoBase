<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\User::create([
            'name' => 'Luis Rojas',
            'email' => 'lrojas@tubrica.com',
            'title' => 'Ing. Sistemas',
            'status_id' => 1,
            'password' => 12345678,
        ]);
        
        factory(App\User::class, 20)->create();
    }
}
