<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class BlogController extends Controller
{
	public function showBlog()
	{
		$category = Category::all();
		$product = Product::all();
		return view('blog', ['category' => $category, 'product' => $product], ['title' => 'Блог']);
	}    
}
