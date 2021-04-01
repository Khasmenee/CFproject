<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;
class ReviewController extends Controller
{
    public function store(Request $request){
        $input['orderID']=$request->orderID;
        $input['productID']=$request->productID;
        $input['star']=$request->star;
        $input['title']=$request->title;
        $input['des']=$request->des;
        Review::create($input);

        $product = Product::findOrFail($request->productID);
        if($request->star==1 || $request->star==2){
            if($product->star>1){
                $inp['star']=$product->star-1;
                $product->update($inp);
                return redirect('/review/order/'.$request->orderID);
            }
        }elseif($request->star==4 || $request->star==5){
            if($product->star<5){
                $inp['star']=$product->star+1;
                $product->update($inp);
                return redirect('/review/order/'.$request->orderID);
            }
        }else{
            return redirect('/review/order/'.$request->orderID);
        }
        return redirect('/review/order/'.$request->orderID);
    }
}
