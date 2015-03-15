<?php namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller {

    public $viewData = [];

	public function __construct()
	{
        $this->viewData['categories'] = Category::all();
	}

}
