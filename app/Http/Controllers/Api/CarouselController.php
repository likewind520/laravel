<?php

namespace App\Http\Controllers\Api;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouselController extends CommonController
{
    public function carousels(){
        //return 11;
        //return Carousel::all();
        //$limit是想要截取的默认的10条数据
        $limit = request()->query('limit',10);
        //return $limit;
        return $this->response->array(Carousel::limit($limit)->get());
    }
}
