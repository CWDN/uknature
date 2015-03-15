<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Species;

class FrontEndController extends Controller {

    public $viewData = [];

	public function __construct()
	{
        $this->viewData['categories'] = Category::all();
	}

    public function index()
    {
        return view('frontend.home', $this->viewData);
    }

    public function category($slug)
    {
        $this->viewData['category'] = Category::bySlug($slug);

        return view('frontend.category', $this->viewData);
    }

    public function species($category, $species)
    {
        $this->viewData['category'] = Category::bySlug($category);
        $this->viewData['species'] = Species::bySlug($species);

        return view('frontend.species', $this->viewData);
    }
}