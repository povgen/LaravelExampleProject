<?php

namespace App\Http\Controllers\Shop;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{

    // Формирум html для вывода всех категорий в виде иерархического дерева

    private function _getHierarchyCategories($rootCategory) {
        $htmlHieracyCategories = '<li class="parent-category">
            <a href="'.route('categories.show', $rootCategory->slug).'">'.$rootCategory->title.'</a>';
        
        $htmlHieracyCategories .= '<ul class="categories">';
        $categoryList = $rootCategory->childCategory();
        if ($categoryList->isEmpty()) {
            $htmlHieracyCategories .= '</li></ul>';
        }
        else {
            foreach ($categoryList as $item) {
                if ($item->childCategory()->isEmpty()) {
                    $htmlHieracyCategories .= '<li><a href="'.$item->slug.'">'.$item->title.'</a></li>';
                }
                else
                    $htmlHieracyCategories .= $this->_getHierarchyCategories($item);
            }
        }
        $htmlHieracyCategories .= '</li></ul>';
        return $htmlHieracyCategories;
    }


    // обарачиваем список li в ul
    public function getHierarchyCategories($rootCategory)
    {
        $html = '<ul class="categories">';

        if (!empty($rootCategory))
            $html .= $this->_getHierarchyCategories($rootCategory);

        $html .= '</ul>';
        return $html;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = ProductCategory::all();
        $categories = ProductCategory::all()->groupBy('parent_id');


        // html для вывода всех категорий в виде иерархического дерева
        $htmlHieracyCategories = $this->getHierarchyCategories($categoryList[0]);



        return view('shop.categories.index', compact('categoryList', 'htmlHieracyCategories'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categoryList = ProductCategory::all();
        $currentCategory = ProductCategory::where('slug', $slug)->first();
        $paginator = Product::where('category_id', $currentCategory->id)->paginate(15);

        

        return view('shop.categories.show', compact('categoryList', 'currentCategory', 'paginator'));
    }

}
