<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    private $controllerName     = 'category';
    private $params             = [];

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $params["category_id"]  = $request->category_id;
        $articleModel  = new ArticleModel();
        $categoryModel = new CategoryModel();


        $itemCategory = $categoryModel->getItem($params, ['task' => 'news-get-item']);
        if(empty($itemCategory))  return redirect()->route('home');

        $itemCategory['articles'] = $articleModel->listItems(['category_id' => $itemCategory['id']], ['task' => 'news-list-items-in-category']);

        return view('newss.pages.category', [
            'params'        => $this->params,
            'itemsCategory'  => $itemCategory
        ]);
    }


}
