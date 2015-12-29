<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
		Model::unguard();
		//$this->call(TaxonCategoryTableSeeder::class);
		//$this->call('TaxaTableSeeder1');
		//$this->call('TaxaTableSeeder2');
        //$this->call('TaxaTableSeeder3');
        Model::reguard();
    }
}