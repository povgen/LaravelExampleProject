<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = Product::paginate(15);

        $categoryList = ProductCategory::all();

        return view('shop.products.index', compact('paginator', 'categoryList'));
    }

    public function search(Request $request) {
        $searchString = $request->input()['search'];    

        $paginator = Product::where('title', 'like', '%'.$searchString.'%')->paginate(15);

        $categoryList = ProductCategory::all();

        return view('shop.products.index', compact('paginator', 'categoryList'));
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Product::where('slug', $slug)->first();

        $categoryList = ProductCategory::all();

        if (empty($item))
            abort(404);


        return view('shop.products.show', compact('item', 'categoryList'));
    }

}
