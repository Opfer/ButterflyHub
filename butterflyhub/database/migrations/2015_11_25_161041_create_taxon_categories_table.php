<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonCategoriesTable extends Migration
{
    public function up()
    {
		Schema::create('taxon_categories', function (Blueprint $table) {
			//primary key
			$table->increments('id');
			
			//columns
			$table->string('name', 100)->unique();
			$table->integer('taxon_category_id')->unsigned()->nullable();
			
			//foreign key
			$table->foreign('taxon_category_id')->references('id')->on('taxon_categories');
			
			//auditory columns
			$table->boolean('is_active')->default(true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
			$table->string('created_by', 255);
			$table->timestamp('updated_at')->nullable();			
			$table->string('updated_by', 255)->nullable();			
			$table->softDeletes();			
		});
    }

    public function down()
    {
        Schema::drop('taxon_categories');
    }
}
