<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController
{
    public function categories(){
//        sleep(3);
//        return Category::all();
        $limit = request()->query('limit',100);
        return $this->response->array(Category::limit($limit)->get());
//        return $this->response->array(Category::all());
    }
}
