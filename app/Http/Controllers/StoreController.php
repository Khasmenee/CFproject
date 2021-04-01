<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewStoreRequest;
use Illuminate\Http\Request;
use App\store;

class StoreController extends Controller
{
    public function update(Request $request,$id){
        $input = $request->all();
        $store = store::findOrFail($id);
        $input['image']=$store->image;
        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['image']=$name;
        }
        if($file = $request->file('slide_image1')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['slide_image1']=$name;
        }
        if($file = $request->file('slide_image2')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['slide_image2']=$name;
        }
        if($file = $request->file('slide_image3')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['slide_image3']=$name;
        }
        $store->update($input);
        return redirect('/dashboard/store');
        
    }
    public function editPay($id){
        $store = store::findOrFail($id);
        return view('dashboard.stores.editPayment',['store'=>$store]);
    }
    public function updatePay(Request $request,$id){
        $input = $request->all();
        $store = store::findOrFail($id);
        $input['bank_image']=$store->bank_image;
        if($file = $request->file('bank_image')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['bank_image']=$name;
        }
        $store->update($input);
        return redirect('/dashboard/payment');
        
    }
    
}
