<?php

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
        $this->call(LanguagesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CountryTranslationsSeeder::class);
        $this->call(RegionsSeeder::class);
        $this->call(RegionTranslationsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(CityTranslationsSeeder::class);
    }
}
