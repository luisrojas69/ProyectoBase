<?php

use Illuminate\Database\Seeder;
use App\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::create(['name' => 'Activo']);
        UserStatus::create(['name' => 'Inactivo']);
        UserStatus::create(['name' => 'Contraseña Expirada']);
    }
}
