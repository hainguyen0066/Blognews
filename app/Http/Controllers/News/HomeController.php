<?php

namespace App\Http\Controllers\News;
use App\Helpers\Feed;
use App\Http\Controllers\Controller;
use App\Models\RssModel;
use Illuminate\Http\Request;;

use App\Models\SliderModel;
use App\Models\ArticleModel;
use App\Models\CategoryModel;

class HomeController extends Controller
{
    private $pathViewController = 'news.pages.home.';  // slider
    private $controllerName     = 'home';
    private $params             = [];
    protected $slider;
    protected $article;
    protected $category;
    protected $rss;


    public function __construct(SliderModel $sliderModel,ArticleModel $articleModel, CategoryModel $categoryModel,RssModel $rssModel)
    {
        view()->share('controllerName', $this->controllerName);
        $this->slider   = $sliderModel;
        $this->article  = $articleModel;
        $this->category = $categoryModel;
        $this->rss = $rssModel;
    }

    public function index(Request $request)
    {
        $itemsSlider   = $this->slider->listItems(null, ['task'   => 'news-list-items']);
        $itemsCategory = $this->category->listItems(null, ['task' => 'news-list-items-is-home']);
        $itemsFeatured = $this->article->listItems(null, ['task'  => 'news-list-items-featured'], 6);
        $itemsLatest   = $this->article->listItems(null, ['task'  => 'news-list-items-latest'], 6);

        foreach ($itemsCategory as $key => $category)
            $itemsCategory[$key]['articles'] = $this->article->listItems(['category_id' => $category['id']], ['task' => 'news-list-items-in-category']);
        $itemsRss   = $this->rss->listItems(null, ['task'   => 'news-list-items']);
        $itemsRss['dataRss'] = Feed::read($itemsRss);
        $data = [
            'params'        => $this->params,
            'itemsSlider'   => $itemsSlider,
            'itemsCategory' => $itemsCategory,
            'itemsFeatured' => $itemsFeatured,
            'itemsLatest'   => $itemsLatest,
            'itemsRss'      => $itemsRss['dataRss'],
            'topCoins'      => Feed::getCoin(),
            'goldPriceHcm'  => Feed::getGold()
        ];

        return view('newss.pages.homepage', $data);
    }

}
