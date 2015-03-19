<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CrudController extends Controller {

    protected $model;

    protected $view;

    protected $rules = [];

    public function __construct()
    {
        $this->viewData = [
            'categories' => $this->getCategories()
        ];
    }

	public function index()
	{
        $model = $this->model;

        $this->viewData['items'] = $model::all();

        return View::make($this->view . '.index', $this->viewData);
	}

	public function create()
	{
        return View::make($this->view . '.create', $this->viewData);
	}

	public function store()
	{
        $input = Input::all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->fails()) {

            return Redirect::route($this->view . '.create')
                ->withErrors($validator)
                ->withInput($input);

        } else {

            $item = new $this->model($input);
            $item->save();

            Session::flash('message', 'Created');

            return Redirect::route($this->view . '.index');
        }
	}

	public function edit($id)
	{
        $model = $this->model;

        $this->viewData['item'] = $model::find($id);

        return View::make($this->view . '.edit', $this->viewData);
	}

	public function update($id)
	{
        $model = $this->model;
        $input = Input::all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->fails()) {

            return Redirect::route($this->view . '.edit', $id)
                ->withErrors($validator)
                ->withInput($input);

        } else {

            $item = $model::find($id);
            $item->fill($input);
            $item->save();

            Session::flash('message', 'Saved');

            return Redirect::route($this->view . '.index');
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
