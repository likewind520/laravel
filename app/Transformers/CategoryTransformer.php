<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\Category;

class CategoryTransformer extends TransformerAbstract{

        public function transform(Category $category){
            //把数组转为json
            return [
                'id' => $category['id'],
                'title' => $category['title'],
            ];
        }

}
