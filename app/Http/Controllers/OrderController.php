<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CabinetController;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Order;

class OrderController extends Controller
{
    public function getCheckOut(Request $request)
    {
    	$product = Product::all();
    	$category = Category::all();
    	$array = [];
    	$array = $request->session()->get('product');
    	$count = 0;
    	$arrayItem = [];
    	$totalSum = [];
    	$totalItems = [];
        $itemVal = [];

			if($request->session()->has('product')) {
				foreach ($array as $key => $value) {
					$addedProduct = Product::where('id', $value)->first();
					$arrayItem[] = $addedProduct;
					$totalSum[] = $addedProduct->price * count($value);
					$totalItems[] = $addedProduct->name;		    		
					$count = $count + count($value); // добавляем количество товаров из массива(повторяющихся).
					$itemVal += [$value[0] => count($value)];
				}
				$totalSum = array_sum($totalSum);
				$totalItems;
			}
			return view('checkout', [
										'itemVal' => $itemVal,
										'totalItems' => $totalItems,
										'totalSum' => $totalSum,
										'product' => $product,
										'arrayItem' => $arrayItem,
										'count' => $count
								],
					['title' => 'Оформление заказа']);
    }
    											/*storeOrder*/
    public function storeOrder(Request $request)
    {
/*    	$validation = $request->validate([
    			'name' => 'required',
    			'tel' => 'required',
    			'message' => 'required'
    	]);*/
    	$order = new Order();
    	$order->name = $request->input('name');
    	$order->user_id = $request->input('user_id');
    	$order->message = $request->input('message');
    	$order->tel = $request->input('tel');
    	$order->total_sum = $request->input('total_sum');
    	$order->oder_items = $request->input('order_items');
    	$order->save();
    	$request->session()->forget('product');

    	return view('done', ['message' => 'Заказ оформлен!']);
    }									/*showDone*/
}
