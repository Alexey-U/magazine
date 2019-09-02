<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
	public function getCatalog()
	{
		$category = Category::all();
		$product = Product::all();
		return view('main-catalog', ['category' => $category, 'product' => $product], ['title' => 'Каталог']);
	}

    public function getCategoryId($category_id)
    {
    	$product = Product::where('category_id', $category_id)->get();
    	$category = Category::all();
    	return view('catalog', ['category' => $category, 'product' => $product], ['title' => 'Каталог']);
    }
}
