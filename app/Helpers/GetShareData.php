<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\ArticleModel;
class GetShareData
{
    public static function getArticleLasted($count)
    {
        $articleModel = new ArticleModel();
        return $articleModel->listItems(null, ['task'  => 'news-list-items-latest'], $count);
    }
}
