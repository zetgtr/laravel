<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNewsAll(): Collection
    {
        return \DB::table($this->table)->get();
    }

    public function getCategoryNews(int $id): Collection
    {
        return DB::table('news')
            ->select([
                'news.id AS id',
                'news.title AS title',
                'news.description AS description',
                'news.author AS author',
                'news.img AS img',
                'news.created_at AS created_at'
            ])
            ->join('categories_has_news AS chn','news.id','=', 'chn.news_id')
            ->join('categories', 'chn.category_id', '=', 'categories.id')
            ->where('chn.category_id','=',$id)
            ->get();
    }

    public function getNewsById(): mixed
    {
        return DB::select();
    }
}
