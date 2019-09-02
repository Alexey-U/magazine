<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\User;
use App\Order;
use Auth;

use Illuminate\Support\Facades\View;

class CabinetController extends Controller
{
    public static $count;

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
        self::$count = 0;
        $arrayItem = [];
        $totalSum = [];
        $itemVal = [];

        if($request->session()->has('product')) {
            foreach ($array as $key => $value) {
                $addedProduct = Product::where('id', $value)->first();
                $arrayItem[] = $addedProduct;        
                $totalSum[] = $addedProduct->price * count($value); 
                self::$count = self::$count + count($value); // добавляем количество товаров из массива(повторяющихся).
                $itemVal += [$value[0] => count($value)];
                /*dump($value[0]);*/
            }
            $totalSum = array_sum($totalSum);
        }
            return view('cart', 
                    [
                        'itemVal' => $itemVal,
                        'product' => $product,
                        'totalSum' => $totalSum,
                        'category' => $category,
                        'arrayItem' => $arrayItem,
                        'count' => self::$count
                    ],
                ['title' => 'Корзина']);
    }   

 	public function addToCart(Request $request, $id)
    {
    	$request->session()->push('product.'.$id, $id);
    	return redirect()->back();
    } 
/*     public function addAjaxToCart(Request $request, $id)
    {
        $request->session()->push('product.'.$id, $id);
        echo self::$count;
    } */
    public function deleteItem(Request $request, $id)
    {
    	if($request->session()->has('product')) {
			$request->session()->pull('product.'.$id);
		}
    	return redirect()->back();
    }
    // Edit account
    public function showEditProfile() 
    {
        return view('cabinet.edit', ['title' => 'редактировать данные']);
    }

    public function postEditProfile(Request $request) 
    {
        $user = User::where('id', Auth::id());
        $user->photo = $request->input('file');
        //$user->save();
        return redirect()->back()->with('message', 'Фото добавлено!');
    }


    public function showBoughtList()
    {
        $order = Order::where('user_id', Auth::id())->get();
        return view('cabinet.boughtlist', ['order' => $order],['title' => 'Список покупок']);
    }
}
