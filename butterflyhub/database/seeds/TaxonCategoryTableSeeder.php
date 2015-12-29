<?php

use Illuminate\Database\Seeder;

class TaxonCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('taxon_categories')->insert([
			['id' => 1, 'name' => "Family", 'taxon_category_id' => null, "created_by" => 'System'],
			['id' => 2, 'name' => "Subfamily", 'taxon_category_id' => 1, "created_by" => 'System'],
			['id' => 3, 'name' => "Tribe", 'taxon_category_id' => 2, "created_by" => 'System'],
			['id' => 4, 'name' => "Genus", 'taxon_category_id' => 3, "created_by" => 'System'],
			['id' => 5, 'name' => "Species", 'taxon_category_id' => 4, "created_by" => 'System'],
			['id' => 6, 'name' => "Subspecies", 'taxon_category_id' => 5, "created_by" => 'System'],
		]);
    }
}
