<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Src\Shared\Enums\RoleTypesEnum;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'person_id' => 1,
            'username' => 'juansepu96',
            'password' => bcrypt('root'),
            'active' => true,
            'role_id' => RoleTypesEnum::ADMINISTRADOR->value
        ]);
    }
}
