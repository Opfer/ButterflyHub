<?php

namespace ButterflyHub\Http\Controllers;

use Illuminate\Http\Request;

use ButterflyHub\Http\Requests;
use ButterflyHub\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use ButterflyHub\TaxonCategory;

class TaxonCategoryController extends Controller
{
    public function index()
    {
        $categories = TaxonCategory::paginate(15);
		return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
		$category = TaxonCategory::findOrFail($id);
		return view('categories.show')->with('category', $category);
    }

    public function edit($id)
    {
		$category = TaxonCategory::findOrFail($id);
		$categories = ['' => ''] + TaxonCategory::lists('name', 'id')->toArray();
        return view('categories.edit')->with('category', $category)->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
		$category = TaxonCategory::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();
		
		$fatherCategory = $input['taxon_category_id'];
		if(empty($fatherCategory)){
			$input['taxon_category_id'] = null;
		}
		
		$category->fill($input)->save();
		//$category->$updated_by = '';
		
		return redirect()->action('TaxonCategoryController@show', $category['id'])->with('status', 'Category successfully updated!');;
    }

    public function destroy($id)
    {
        //
    }
	
}
