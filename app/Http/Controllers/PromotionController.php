<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Session;

class PromotionController extends Controller
{
    public function home(){
        $promotion = Promotion::paginate(5);
        return view('dashboard.stores.promotion',['promotion'=>$promotion]);
    }
    public function store(Request $request){
        $input = $request->all();
        Promotion::create($input);
        return redirect('/dashboard/promotion');
    }
    public function new(){
        return view('dashboard.stores.newPromotion');
    }
    public function edit($id){
        $promotion = Promotion::findOrFail($id);
        return view('dashboard.stores.editPromotion',['promotion'=>$promotion]);
    }
    public function update(Request $request,$id){
        $promotion = Promotion::findOrFail($id);
        $promotion->update($request->all());
        return redirect('/dashboard/promotion');
    }
    public function delete($id){
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect('/dashboard/promotion');
    }
    public function Check(Request $request){
        $promo = Promotion::all();
        if(count(array($promo))>0){
           foreach($promo as $pro){
                if($pro->code==$request->code){
                    $code_id = Promotion::findOrFail($pro->id);
                    if($request->total>=$code_id->sale){
                        Session::flash('alert_can_code','ใช้ส่วนลดนี้ได้ค่ะ');
                        return redirect('/cash');
                    }else{
                        Session::flash('alert_cant_code','ยอดสั่งซื้อไม่ถึงขั้นต่ำของส่วนลดนี้ค่ะ');
                        return redirect('/cash');
                    }
                }
           }
           Session::flash('alert_no_code','ไม่มีรหัสส่วนลดนี้ค่ะ');
           return redirect('/cash');
        }else{
            Session::flash('alert_no_code','ไม่มีรหัสส่วนลดนี้ค่ะ');
            return redirect('/cash');
        }
    }
}
