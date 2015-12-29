<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxaTable extends Migration
{
    public function up()
    {
        Schema::create('taxa', function (Blueprint $table) {
			//primary key
			$table->integer('id')->unsigned();
			$table->primary('id');
			
			//columns
			$table->integer('taxon_sort')->unsigned()->nullable();
			$table->string('name', 100);
			$table->string('english_name', 255)->nullable();
			
			//foreign keys
			$table->integer('taxon_id')->unsigned()->nullable();
			$table->integer('taxon_category_id')->unsigned()->nullable();
			
			//foreign keys relashionship
			$table->foreign('taxon_category_id')->references('id')->on('taxon_categories');
			$table->foreign('taxon_id')->references('id')->on('taxa');
			
			//auditory columns
			$table->boolean('is_active')->default(true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
			$table->string('created_by', 255);
			$table->timestamp('updated_at')->nullable();			
			$table->string('updated_by', 255)->nullable();			
			$table->softDeletes();			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taxa');
    }
}
