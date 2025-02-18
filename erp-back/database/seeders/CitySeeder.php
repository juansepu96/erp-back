<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Src\Shared\Enums\CityEnum;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = CityEnum::cases();

        foreach ($cities as $city) {
            $id = $city->value;
            $province_id = $city->provinceId($id);
            $name = str_replace('_', ' ', $city->name($id));
            DB::table('cities')->updateOrInsert(
                ['id' => $id],
                ['name' => $name, 'province_id' => $province_id]
            );
        }
    }
}
