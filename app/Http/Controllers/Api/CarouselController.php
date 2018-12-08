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

        return $this->response->array(Carousel::all());

    }
}
