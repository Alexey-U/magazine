<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Auth;
use App\Post;
use App\Like;
use App\User;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   	public static function getCategories(Request $request)
   	{
         $category = Category::all();
         $product = Product::paginate(6);
         $userPhoto = User::where('id', Auth::id())->first();
         $array = [];
         $array = $request->session()->get('product');
         $count = 0;
         
         if($request->session()->has('product')) {
            foreach ($array as $key => $value) {
               $addedProduct = Product::where('id', $value)->first();
               $arrayItem[] = $addedProduct;
               $count = $count + count($value);
            }
         }
            return view('layouts.index',
                     [
                        'userPhoto' => $userPhoto,
                        'category' => $category,
                        'product' => $product,
                        'count' => $count
                     ],
                        ['title' => 'Главная']);
   	}

   	public function getProductDetails(Request $request, int $product_id)
   	{
         $post = Post::all();
         $likeAll = Like::all()/*where('like_from_id', Auth::id())->first()*/;
         $likeFrom = Like::where('like_from_id', Auth::id())->get();
         $likeFromNot = Like::all()->whereNotIn('like_from_id', Auth::id());

         $product = Product::all();
         $product_item = Product::where('id', $product_id)->first();

         $category = Category::all();

         $user = User::all();

         return view('product-details', 
                     [
                        'user' => $user,
                        'likeFromNot' => $likeFromNot,                             
                        'likeFrom' => $likeFrom,
                        'likeAll' => $likeAll,
                        'post' => $post,
                        'category' => $category,
                        'product_item' => $product_item,
                        'product' => $product
                     ],
                        ['title' => 'Товар']);
   	}

      public function showContact()
      {
         return view('contact', ['title' => 'Контакты']);
      }
}
