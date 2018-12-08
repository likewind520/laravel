<?php
namespace App\Transformers;
use App\Models\Carousel;
use League\Fractal\TransformerAbstract;

class CarouselTransformer extends TransformerAbstract{

        public function transform(Carousel $carousel){
            //把数组转为json
            return [
                'id' => $carousel['id'],
                'name' => $carousel['name'],
                'icon' => $carousel['icon'],
            ];
        }

}
