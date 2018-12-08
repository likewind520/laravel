<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\Article;
//TransformerAbstract  ??
class ArticleTransformer extends TransformerAbstract{
    # 定义可以include可使⽤用的字段
    protected $availableIncludes = ['category'];

    public function transform(Article $article){
        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'created_at' => $article->created_at->toDateTimeString()
        ];

    }
    public function includeCategory(Article $article)
    {
        return $this->item($article->category, new CategoryTransformer());
    }


}
