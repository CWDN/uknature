<?php namespace App\Http\Controllers\FrontEnd;

use App\Category;

class CategoryController extends FrontEndController {

	public function show($slug)
	{
        $this->viewData['category'] = Category::where('slug', $slug)->firstOrFail();

		return view('frontend.category', $this->viewData);
	}

}
