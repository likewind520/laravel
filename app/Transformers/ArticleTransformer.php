<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\Article;

class ArticleTransformer extends TransformerAbstract{
    # 定义可以include可使⽤用的字段
    protected $availableIncludes = ['category','user'];

    public function transform(Article $article){
        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'content'=>$article['content'],
            //'created_at' => $article->created_at->toDateTimeString()
            //format('Y-m-d') 是carbon时间库中的函数
            'created_at' => $article->created_at->format('Y-m-d')

        ];
    }
    //通过文章找到栏目数据
    public function includeCategory(Article $article)
    {
        return $this->item($article->category, new CategoryTransformer());
    }
    //通过文章找到文章作者
    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformer());
    }


}
