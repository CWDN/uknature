<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SpeciesController extends Controller {

    protected $rules = [
        'name' => 'required',
        'binomial' => 'required',
        'description' => 'required',
        'slug' => 'required',
    ];

	public function index()
	{
        $items = Species::all();

        return View::make('admin.species.index', ['items' => $items]);
	}

	public function create()
	{
        return View::make('admin.species.create', [
            'categories' => $this->getCategories()
        ]);
	}

	public function store()
	{
        $input = Input::all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->fails()) {
            return Redirect::route('admin.species.create')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            $species = new Species($input);
            $category = Category::find($input['category']);
            $species->category()->associate($category);
            $species->save();
            Session::flash('message', 'Created');
            return Redirect::route('admin.species.index');
        }
	}

	public function edit($id)
	{
        $item = Species::find($id);

        return View::make('admin.species.edit', [
            'item' => $item,
            'categories' => $this->getCategories()
        ]);
	}

	public function update($id)
	{
        $input = Input::all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->fails()) {
            return Redirect::route('admin.species.edit', $id)
                ->withErrors($validator)
                ->withInput($input);
        } else {
            $species = Species::find($id);
            $species->fill($input);
            $category = Category::find($input['category']);
            $species->category()->associate($category);
            $species->save();
            Session::flash('message', 'Saved');
            return Redirect::route('admin.species.index');
        }
	}

	public function destroy($id)
	{
		//
	}

    private function getCategories()
    {
        $categories = [];
        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return $categories;
    }

}
