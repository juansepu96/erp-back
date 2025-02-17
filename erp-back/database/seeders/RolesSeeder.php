<?php

namespace Database\Seeders;


use App\Models\Role;
use Illuminate\Database\Seeder;
use Src\Shared\Enums\RoleTypesEnum;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        foreach (RoleTypesEnum::cases() as $role) {
            Role::firstOrCreate([
                'id' => $role->value,
                'name' => $role->name,
            ]);
        }
    }
}
