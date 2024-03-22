<?php

namespace Modules\PanelUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\PanelUser\Models\PanelUser;

class PanelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PanelUser::create([
            "name" => "erfan",
            "password" => "123456",
            "mobile" => "09036583793",
            "username" => "erfan",
        ]);
    }
}
