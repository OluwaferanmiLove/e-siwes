<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiwesSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siwes_settings')->insert([
            [
                'siwes_start' => "No",
                'siwes_end' => "No",
                'supervisor_assigned' => "No",
            ]
        ]);
    }
}
