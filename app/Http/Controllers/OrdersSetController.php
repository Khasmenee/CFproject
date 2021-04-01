<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\Product;
use App\Category;
use App\Status;
use App\Reject;
use App\User;
use App\ToDoList;
use App\Payment;
use Session;



class OrdersSetController extends Controller
{
    public function store(Request $request)
    {   
        $userID = Auth::user()->id;
        if($request->orderID>0 && $request->orderdetailID>0){
            Session::flash('alert_cart','สินค้านี้อยู่ในรถเข็นแล้วค่ะ');
            return redirect('/product/show/'.$request->productID);
        }else if($request->orderID>0 && $request->orderdetailID<=0){
            $o = Order::findOrFail($request->orderID);
            $inp = $request->all();
            $o->list=$o->list+1;
            $o->update($inp);
            $input['orderID']=$request->orderID;
            $input['productID']=$request->productID;
            $input['quantity']=1;
            $input['detail']="คละไซส์";
            Orderdetail::create($input);
            return redirect('/product/show/'.$request->productID);
        }else{
            $inp['userID']=$userID;
            $inp['status']=0;
            $inp['list']=1;
            $inp['paymentID']=0;
            $inp['date']="00/00/0000";
            $order = Order::create($inp);
            $input['orderID']=$order->id;
            $input['productID']=$request->productID;
            $input['quantity']=1;
            $input['detail']="คละไซส์";
            Orderdetail::create($input);
            return redirect('/product/show/'.$request->productID);

        }     
    }
    public function storeComplete(Request $request)
    {   
        $userID = Auth::user()->id;
        if($request->orderID>0 && $request->orderdetailID<=0){
            if($request->detail1>=100 && $request->detail2>=100){
                $o = Order::findOrFail($request->orderID);
                $input = $request->all();
                $o->list=2;
                $o->date=$request->date;
                $o->update($input);
                $in['orderID']=$request->orderID;
                $in['productID']=$request->product1;
                $in['quantity']=$request->quantity1;
                $in['detail']=$request->detail1;
                Orderdetail::create($in);
                $inp['orderID']=$request->orderID;
                $inp['productID']=$request->product2;
                $inp['quantity']=$request->quantity2;
                $inp['detail']=$request->detail2;
                Orderdetail::create($inp);
                return redirect('/cash');
            }else{
                Session::flash('alert_quantity','สินค้าต้องไม่ต่ำกว่า 100 ชิ้นค่ะ');
                return redirect('/complete');
            }
        }else{
            if($request->orderID>0 && $request->orderdetailID<=0){
                $input['userID']=$userID;
                $input['status']=0;
                $input['list']=2;
                $input['paymentID']=0;
                $input['date']=$request->date;
                $order = Order::create($input);
                $in['orderID']=$order->id;
                $in['productID']=$request->product1;
                $in['quantity']=$request->quantity1;
                $in['detail']=$request->detail1;
                Orderdetail::create($in);
                $inp['orderID']=$order->id;
                $inp['productID']=$request->product2;
                $inp['quantity']=$request->quantity2;
                $inp['detail']=$request->detail2;
                Orderdetail::create($inp);
                return redirect('/cash');
            }
        }     
    }
    
    public function delete(Request $request,$orderdetailID,$orderID){
        Orderdetail::findOrFail($orderdetailID)->delete();
        $order = Order::findOrFail($orderID);
        $input = $request->all();
        $order->list=$order->list-1;
        $order->update($input);
        return redirect('/cart');
    }
    
    public function QuantityUpdate(Request $request,$id){
        $orderdetail = Orderdetail::findOrFail($id);
        $input['quantity']=$request->quantity;
        $input['detail']=$request->detail;
        $orderdetail->update($input);
        return redirect('/cart');
    }
    public function Check(Request $request){
        if($request->list==0){
            Session::flash('alert_no_product_in_cart','ไม่มีสินค้าภายในรถเข็นค่ะ');
            return redirect('/cart');
        }
        return redirect('/cash');
    }
    public function StatusUpdate(Request $request,$id){
        $inp['orderID']=$id;
        $inp['status']=$request->status;
        $status = Status::create($inp);

        $order = Order::findOrFail($id);
        $input['status']=$status->id;
        $order->update($input);

        
        return redirect('/dashboard/order');
    }
    public function RejectOrder(Request $request,$id){

        $input['orderID']=$id;
        $input['title']=$request->title;
        $input['des']=$request->des;
        Reject::create($input);

        $inp['orderID']=$id;
        $inp['status']=-1;
        $status = Status::create($inp);

        $order = Order::findOrFail($id);
        $input['status']=$status->id;
        $order->update($input);
        return redirect('/dashboard/order');
    }
    public function homeManage(){
        $od = 0;
        $order = Order::all();
        $status = Status::all();
        $list = ToDoList::all();
        $user = User::all();
        return view('dashboard.manage',['orders' => $order,'od' => $od,'status' => $status,'users' => $user,'list' => $list]);
    }
    public function showManage($id){
        $order = Order::all();
        $od = $id;
        $status = Status::all();
        $list = ToDoList::all();
        $user = User::all();
        return view('dashboard.manage',['orders' => $order,'od' => $od,'status' => $status,'users' => $user,'list' => $list]);
    }
    public function deleteOrder($id){
        $orderdetail = Orderdetail::all();
        foreach($orderdetail as $ordt){
            if($id==$ordt->orderID){
                Orderdetail::findOrFail($ordt->id)->delete();
            }
        }
        $order = Order::findOrFail($id);
        Payment::findOrFail($order->paymentID)->delete();
        Order::findOrFail($id)->delete();
        return redirect('/dashboard/admin/order');

    }
    public function OrderUpdate(Request $request,$id){
        
        $order = Order::findOrFail($id);
        $payment = Payment::findOrFail($order->paymentID);
        $orderdetail = Orderdetail::findOrFail($request->orderdetailID);
        $input['quantity']=$request->quantity;
        $input['detail']=$request->detail;
        $orderdetail->update($input);
        
        $inp['date']=$request->date;
        $order->update($inp);

        return redirect('/dashboard/admin/order');
    }

}
