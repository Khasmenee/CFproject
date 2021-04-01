<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class ShopController extends Controller
{
    /*$products = Product::inRandomOrder()->take(6)->get();

    return view('product.show')->with('products',$products);*/
    /*public function showct($id){
        $category = Category::findOrFail($id);
        return view('category.Fshow',['category' =>$category]);
    }*/
    /*public function showpd($id)
    {
            $products = Product::orderBy('id','desc')->paginate(6);
            return view('product.ShowDetail',['products' => $products]);
    }*/
    /*public function showpd($id)
    {
            $products = Product::orderBy('id','desc')->paginate(6);
            return view('category.Fshow',['products' => $products]);
    }*/
}
