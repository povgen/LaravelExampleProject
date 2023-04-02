<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Session\Session;
use App\Mail\Order;

class BasketController extends Controller
{
    public function index()
    {
        $orderList = session('order');
    	if ($orderList->isEmpty())
   			$orderList = null;
        $categoryList = ProductCategory::all();
        return view('shop.pages.basket', compact('orderList', 'categoryList'));
    }

    public function addItem($id)
    {
    	$item = Product::find($id);
    	$tradeItem = [
			'item'  => $item,
			'count' => 1
		];
    	if (Empty(session('order'))) {
	    	$coll = collect();
	    	$coll->push($tradeItem);
	    	session(['order' =>	$coll]);
    	} else {
    		$inColl = false;
    		$coll = session('order');
    		foreach ($coll as $key => $value) {
    			if ($value['item'] == $item)
    			{
    				$tradeItem['count'] =  $coll[$key]['count'] + 1;
    				$coll[$key] = $tradeItem;
    				$inColl = true;
    				break;
    			}
    		}

    		if (!$inColl)
	    		$coll->push($tradeItem);

	    	session(['order' =>	$coll]);
    	}
    }
    /*
		$idArr - ключ элемента из коллекции session('order')
    */
    public function removeItem($idArr) 
    {
		$orderList = session('order');
		$orderList->pull($idArr);
   		if ($orderList->isEmpty())
   			$orderList = null;

        $categoryList = ProductCategory::all();

        return view('shop.pages.basket', compact('orderList', 'categoryList'));
    }

	/**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function changeCount(Request $request) 
    {
    	$data = $request->input();
    	$tradeItem = session('order')[$data['key']];
    	$tradeItem['count'] = $data['count'];
    	session('order')[$data['key']] = $tradeItem;
    }

    public function clear() {
		session()->forget('order');
    	$orderList = session('order');
        $categoryList = ProductCategory::all();

        return view('shop.pages.basket', compact('orderList', 'categoryList'));
    } 

    public function createOrder()
    {
    	$orderList = session('order');

        $categoryList = ProductCategory::all();
        return view('shop.pages.order', compact('orderList', 'categoryList'));
    }

    public function sendEmail(Request $request)
    {
    	\Mail::to('povgen@yandex.ru')->send(new Order($request->input()));
    	echo '<script>alert("Ваш заказ отправлен, ждите с вами свяжится наш оператор!");history.back();</script>';
    }

}
