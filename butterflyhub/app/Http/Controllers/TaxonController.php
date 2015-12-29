<?php

namespace ButterflyHub\Http\Controllers;

use ButterflyHub\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use ButterflyHub\Taxon;
use ButterflyHub\TaxonCategory;
use Input;

class TaxonController extends Controller
{
	public $order = array(
			"id"=>"asc",
			"taxon_sort"=>"asc",
			"name"=>"asc",
			"english_name"=>"asc"
	);

    public function index()
    {
		$taxa = Taxon::paginate(15);
		return view('taxa.index')->with('taxa', $taxa)
								->with('order', $this->order);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
		$taxon = Taxon::findOrFail($id);
        $taxonTree = Taxon::where('taxon_id', $id)->paginate(5);
		return view('taxa.show')->with('taxon', $taxon)
								->with('taxonomy', $this->getTaxonomy($taxon))
								->with('taxonTree', $taxonTree);
    }

    public function edit($id)
    {
		$taxon = Taxon::findOrFail($id);
		$newCategoriesOptions = TaxonCategory::where('id', '<=', $taxon->category['id'])->get()->lists('name', 'id')->toArray();;
        return view('taxa.edit')->with('taxon', $taxon)
								->with('taxonomy', $this->getTaxonomy($taxon))
								->with('newCategoriesOptions', $newCategoriesOptions)
								->with('fatherTaxonomy', $this->getTaxonomy($taxon->father_taxon))
								->with('count', $this->countTaxa());
    }

    public function update(Request $request, $id)
    {
		$taxon = Taxon::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();

		//taxon sort number reorder
		$newTaxonSortNumber = $input['taxon_sort'];
		if($newTaxonSortNumber){
			$this->reorderTaxaSortNumbers($taxon, $newTaxonSortNumber);
		}

		//$taxon->$updated_by = '';
		$taxon->fill($input)->save();

		return redirect()->action('TaxonController@show', $taxon['id'])->with('status', 'Taxon successfully updated!');
    }

    public function destroy($id)
    {
		$taxon = Taxon::withTrashed()->find($id)->delete();
		return 'bad';
    }

	public function restore($id){
		$taxon = Taxon::withTrashed()->find($id)->restore();
		return 'good';
	}

	public function countTaxa(){
		$count = Taxon::count();
		return $count;
	}

	public function searchTaxonByName(){
		$taxonName = Input::get('term');
		$newCatID = Input::get('newCatID');

		$taxaSearch = Taxon::where('name', 'LIKE', '%'.$taxonName.'%')->where('taxon_category_id', '<=', $newCatID)->orderBy('name', 'asc')->get();
		$taxaSearchArray = array();

		if($taxaSearch){
			foreach($taxaSearch as $taxonSearch){
				$taxaSearchArray[] = array (
					"label"=>$this->getTaxonomyNoFormat($taxonSearch),
					"id"=>$taxonSearch['id'],
					"desc"=>$this->getTaxonomy($taxonSearch),
					"name"=>$taxonSearch['name'],
				);
			}
		}

		return response()->json($taxaSearchArray);
	}

	public function getTaxonEditOrder(){
		$taxonID = Input::get('taxonID');
		$taxonSortNumber = Input::get('taxonSortNumber');

		if($taxonSortNumber>0 && $taxonID >= 0){
			$taxon = Taxon::findOrFail($taxonID);

			$minSortNumber = 1;
			$maxSortNumber = $this->countTaxa();

			$taxaPerSearch = 6;
			$highlightTaxaNumber = 3;
			$sortNumber = 0;
			$case = "";

			if(($taxonSortNumber-$highlightTaxaNumber)>=$minSortNumber && ($taxonSortNumber+$highlightTaxaNumber)<=$maxSortNumber){
				$sortNumber = $taxonSortNumber-$highlightTaxaNumber;
			}else if(($taxonSortNumber-$highlightTaxaNumber)<$minSortNumber){
				$sortNumber = 1;
			}else if(($taxonSortNumber+$highlightTaxaNumber)>$maxSortNumber){
				$sortNumber = $maxSortNumber-6;
			}

			$taxaSearchArray = array();
			$taxonList = Taxon::where('taxon_sort', '>=', $sortNumber)->where('id','!=', $taxonID)->orderBy('taxon_sort', 'asc')->take($taxaPerSearch)->get();
			$taxonList[] = null;

			if($taxonList){
				foreach($taxonList as $taxonItem){
					if($sortNumber == $taxonSortNumber){
						$taxaSearchArray[] = array (
							"id"=>$taxon->id,
							"taxon_sort"=>$sortNumber++,
							"name"=>$taxon->name,
							"english_name"=>$taxon->english_name,
							"category"=>$taxon->category['name'],
							"father_taxon"=>$taxon->father_taxon['name']
						);
					}

					if($taxonItem){
						$taxaSearchArray[] = array (
							"id"=>$taxonItem->id,
							"taxon_sort"=>$sortNumber++,
							"name"=>$taxonItem->name,
							"english_name"=>$taxonItem->english_name,
							"category"=>$taxonItem->category['name'],
							"father_taxon"=>$taxonItem->father_taxon['name']
						);
					}
				}
			}
			return response()->json($taxaSearchArray);
		}

		return null;
	}

	public function reorderTaxaConsecutiveNumbers(){
		$taxaSearch = Taxon::orderBy('taxon_sort', 'asc')->get();

		$out = 0;
		foreach($taxaSearch as $search){
			$search->taxon_sort = $out;
			$search->save();
			$out++;
		}

		return $out;
	}

	public function reorderTaxaSortNumbers($taxon, $newTaxonSortNumber){
		$taxaSearch = Taxon::where('taxon_sort','=', $newTaxonSortNumber)->orderBy('taxon_sort', 'asc')->get();

		$out = 0;

		foreach($taxaSearch as $search){
			if($search->taxon_sort == $newTaxonSortNumber){
				$taxon->taxon_sort = $newTaxonSortNumber;
				$taxon->save();
				$out++;
			}else{
				$search->taxon_sort = $out++;
			}
			$search->save();
		}
	}

	public function getTaxonomy($taxon){
        $array[] = "";
        $array = $this->concatenateName($taxon);
        $result = "";

       if(count($array)){
            foreach ($array as $key => $value){
                if($key == 0){//None
                    $result .= '<span class="taxonomy-none">'.$value.'</span>';
                }
				elseif($key == 1){//Family
                    $result .= '<span class="taxonomy-family">'.$value.'</span>';
                }
                elseif($key == 2){//Subfamily
                    $result .= '<span class="taxonomy-subfamily">'.$value.'</span>';
                }
                elseif($key == 3){//Tribe
                    $result .= '<span class="taxonomy-tribe">'.$value.'</span>';
                }
                elseif($key == 4){//Genus
                    $result .= '<span class="taxonomy-genus">'.$value.'</span>';
                }
                elseif($key == 5){//Species
                    $result .= '<span class="taxonomy-species">'.$value.'</span>';
                }
                elseif($key == 6){//Subspecies
                    $result .= '<span class="taxonomy-subspecies">'.$value.'</span>';
                }
            }
        }
        return $result;
	}

	public function getTaxonomyNoFormat($taxon){
        $array[] = "";
        $array = $this->concatenateName($taxon);
        $result = "";

       if(count($array)){
            foreach ($array as $key => $value){
                 if($key == 0){//None
                    $result .= $value.' ';
                }
				elseif($key == 1){//Family
                    $result .= $value.' ';
                }
                elseif($key == 2){//Subfamily
                    $result .= $value.' ';
                }
                elseif($key == 3){//Tribe
                    $result .= $value.' ';
                }
                elseif($key == 4){//Genus
                    $result .= $value.' ';
                }
                elseif($key == 5){//Species
                    $result .= $value.' ';
                }
                elseif($key == 6){//Subspecies
                    $result .= $value.' ';
                }
            }
        }
        return $result;
	}

    private function concatenateName($taxon){
        $array = [];
        $parentTaxon = $taxon->father_taxon;

        if(!is_null($parentTaxon)){
            $array = $this->concatenateName($parentTaxon);
        }
        $array[$taxon->category['id']] = $taxon->name;

        return $array;
    }

	public function sort($criteria, Request $request)
	{
		if($criteria == 'id' || $criteria == 'taxon_sort' || $criteria == 'name' || $criteria == 'english_name'){
			if($request->input('order')=='asc'){
				$this->order[$criteria] = "desc";
			}else{
				$this->order[$criteria] = "asc";
			}
			$taxa = Taxon::orderBy($criteria, $request->input('order'))->paginate(15);
			return view('taxa.index')->with('taxa', $taxa)
									->with('order', $this->order);
		}else{
			return index();
		}
	}
}