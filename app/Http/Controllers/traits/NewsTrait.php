<?php

namespace App\Http\Controllers\traits;

trait NewsTrait
{
    public function getCategories(int $id = null):array
    {
        $categories = array();
        $countCategories = 5;
        if($id === null)
        {
            for($i=1;$i<$countCategories;$i++)
            {
                $categories[] = [
                    'id'=>$i,
                    'title'=>\fake()->jobTitle(),
                ];
            }
        }else{
            $categories[] = [
                'id'=>$id,
                'title'=>\fake()->jobTitle(),
            ];
        }
        return $categories;
    }
    public function getNewsCategory(array $news,int|null $id):array
    {
        $data = array();
        foreach ($news as $n)
        {
            if($n['id_categories'] == $id || is_null($id))
            {
                $data[] = $n;
            }
        }
        return $data;
    }
    public function getNews(int $id = null):array
    {
        $news = array();
        $countNews = 21;
        if($id === null)
        {
            $categoryId = 0;
            for($i=1;$i<$countNews;$i++)
            {
                $news[$i] = [
                    'id'=>$i,
                    'id_categories' => $i % 5 === 1 ? ++$categoryId : $categoryId,
                    'publish' => $i % 7 === 1,
                    'author'=>\fake()->userName(),
                    'title'=>\fake()->jobTitle(),
                    'description'=>\fake()->text(100),
                    'created_at'=>\now()->format('d.m.Y H:i')
                ];
            }
        }else{
            $news = [
                'id'=>$id,
                'author'=>\fake()->userName(),
                'title'=>\fake()->jobTitle(),
                'description'=>\fake()->text(1000),
                'created_at'=>\now()->format('d.m.Y H:i')
            ];
        }
        return $news;
    }
}
