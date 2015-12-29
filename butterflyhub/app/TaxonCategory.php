<?php

namespace ButterflyHub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxonCategory extends Model
{
	use SoftDeletes;
	protected $table = 'taxon_categories';
	protected $fillable = ['name','taxon_category_id', 'created_by', 'edited_by'];
	protected $dates = ['created_at', 'updated_at', 'disabled_at'];
	
	public function father_category()
	{
		return $this->belongsTo(TaxonCategory::class, 'taxon_category_id');
	}
	
	public function taxa()
	{
		return $this->hasMany('ButterflyHub\Taxon');
	}
}
