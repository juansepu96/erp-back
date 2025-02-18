<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Src\Shared\Enums\ProvinceEnum;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = ProvinceEnum::cases();

        foreach ($provinces as $province) {
            $id = $province->value;
            $name = $province->name();

            DB::table('provinces')->updateOrInsert(
                ['id' => $id],
                ['name' => $name]
            );
        }
    }
}
