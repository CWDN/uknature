<?php namespace App\Http\Controllers\Admin;

class CategoryController extends CrudController {

    protected $model = 'App\Category';

    protected $view = 'admin.category';

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
    ];
}
