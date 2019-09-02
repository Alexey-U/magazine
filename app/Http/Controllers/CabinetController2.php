<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use Illuminate\Support\Facades\View;

use Auth;



class CabinetController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


    public function showAccount()
    {
        return view('account', ['title' => 'Кабинет']);
    }

	public function showCart(Request $request)
	{
		$product = Product::all();
		$category = Category::all();
		$array = [];
		$array = $request->session()->get('product');
		$count = 0;
		$arrayItem = [];
		$totalSum = [];

		//dump($request->session());
		if($request->session()->has('product')) {
			foreach ($array as $key => $value) {
			$addedProduct = Product::where('id', $value)->first();
			$arrayItem[] = $addedProduct;
				if(in_array($value, $array)) {
					$totalSum[] = $addedProduct->price + $addedProduct->price;
					$count++;
					}
			}
				$totalSum = array_sum($totalSum);
		}
			return view('cart', ['product' => $product, 'totalSum' => $totalSum, 'category' => $category, 'arrayItem' => $arrayItem, 'count' => $count], ['title' => 'Корзина']);
	}

	public function addToCart(Request $request, $id)
	{
			$request->session()->push('product'/*.$id*/, $id);
		/*$request->session()->push('amount'.$id, +1);*/
			$session = $request->session()->all();
			return redirect()->back();
	}

    public function deleteItem(Request $request, $id)
    {
      	if($request->session()->has('product')) {
  			$request->session()->pull('product.'.$id);
  		  }
    	return redirect()->back();
    }
}
