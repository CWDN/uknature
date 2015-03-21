<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use App\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SpeciesController extends CrudController {

    protected $model = 'App\Species';

    protected $view = 'admin.species';

    protected $rules = [
        'name' => 'required',
        'binomial' => 'required',
        'description' => 'required',
        'slug' => 'required',
    ];

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
            $category = Category::find($input['category']);
            $item->category()->associate($category);
            $item->save();

            Session::flash('message', 'Created');

            return Redirect::route($this->view . '.index');
        }
    }

    public function update($id)
    {
        $input = Input::all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->fails()) {

            return Redirect::route($this->view . '.edit', $id)
                ->withErrors($validator)
                ->withInput($input);

        } else {

            $species = Species::find($id);
            $species->fill($input);

            //dd(Input::get('imagedelete'),Input::get('imageid'), Input::get('caption'), Input::file('image'));

            $this->handleImages($species);

            $category = Category::find($input['category']);
            $species->category()->associate($category);

            $species->save();

            Session::flash('message', 'Saved');

            return Redirect::route($this->view . '.index');
        }
    }

    private function handleImages($species) {

        $ids = Input::get('imageid');
        $deletions = Input::get('imagedelete');
        $captions = Input::get('caption');
        $files = Input::file('image');

        if(!is_null($deletions)) {
            foreach ($deletions as $ix => $id) {

                $image = Image::find($id);

                File::delete($image->src);

                $image->delete();

                $key = array_search($id, $ids);

                // remove from other arrays
                array_splice($ids, $key, 1);
                array_splice($captions, $key, 1);
                array_splice($files, $key, 1);
            }
        }

        foreach($ids as $ix => $id) {

            $file = $files[$ix];
            $caption = $captions[$ix];

            if($id == "") {
                if(is_null($file)) { continue; }
                $image = new Image();
            } else {
                $image = Image::find($id);
            }

            if(!is_null($file)) {
                $file->move('images/uploads', $file->getClientOriginalName());
                $image->src = 'images/uploads/' . $file->getClientOriginalName();
            }

            $image->caption = $caption;
            $image->order = $ix;

            $species->images()->save($image);
        }

    }


    public function create()
    {
        $this->viewData['images'] = [];

        return View::make($this->view . '.create', $this->viewData);
    }

    public function edit($id)
    {
        $model = $this->model;

        $item = $model::find($id);

        $this->viewData['item'] = $item;

        $this->viewData['images'] = $item->images->all();

        return View::make($this->view . '.edit', $this->viewData);
    }

}
