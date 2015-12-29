<?php namespace ButterflyHub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxon extends Model
{
	use SoftDeletes;
	public $incrementing = false;
	
	protected $table = 'taxa';
	protected $fillable = ['name', 'english_name', 'taxon_sort', 'taxon_category_id'];
	protected $dates = ['created_at', 'updated_at', 'disabled_at'];
	
	public function children_taxon()
	{
		return $this->hasMany('ButterflyHub\Taxon');
	}
	
	public function father_taxon()
	{
		return $this->belongsTo(Taxon::class, 'taxon_id');
	}
	
	public function category()
	{
		return $this->belongsTo(TaxonCategory::class, 'taxon_category_id');
	}
}
