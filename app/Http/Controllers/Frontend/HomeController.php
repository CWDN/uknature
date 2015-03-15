<?php namespace App\Http\Controllers\FrontEnd;

use App\Category;

class HomeController extends FrontEndController {

	public function index()
	{
		return view('frontend.home', $this->viewData);
	}

}
