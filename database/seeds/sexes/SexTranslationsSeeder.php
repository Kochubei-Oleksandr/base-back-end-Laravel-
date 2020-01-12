<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SexTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->sql_dump();
    }

    /**
     * Dump using raw SQL queries
     * not very reliable
     */
    private function sql_dump()
    {
        $path = database_path('dump_data/sexes/sex_translations.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('sex_translations table seeded!');
    }
}
