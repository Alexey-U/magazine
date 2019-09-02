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

            

      		    	if($request->session()->has('product')) {


          			    	foreach ($array as $key => $value) {

              			    		$addedProduct = Product::where('id', $value)->first();

                            
                              $arrayItem[] = $addedProduct;

                              /*if(in_array($value, $array)) {*/
                            
                              $totalSum[] = $addedProduct->price;

                              $count++;
                            /*}*/

          			    	}

          				    $totalSum = array_sum($totalSum);


      				  }
dump($request->session()->all());

      		    	return view('cart', [
      							    		'product' => $product,
      							    		 'totalSum' => $totalSum,
      							    		  'category' => $category,
      							    		   'arrayItem' => $arrayItem,
      							    		    'count' => $count
      		    						],
      		    		    ['title' => 'Корзина']);
  }


  public function addToCart(Request $request, $id)
  {
    $request->session()->push('product'/*.$id*/, $id);
    /*$session = $request->session()->all();*/
    return redirect()->back();
  }


    public function deleteItem(Request $request, $id)
    {
        $array = [];
      	if($request->session()->has('product')) {
        $array = $request->session()->get('product');
        /*$request->session()->pull('product', 1);*/
        $array = array_flip($array);
        unset($array[$id]);
        $array = array_flip($array);
        }
        return redirect()->back();
    }
}
