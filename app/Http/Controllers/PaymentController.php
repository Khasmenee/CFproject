<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Payment;
use App\Status;

class PaymentController extends Controller
{
    public function store(Request $request)
    {

        $input['image']='nophoto.jpg';
        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);
            $input['image']=$name;
        }
        $input['total']=$request->total;
        $input['paid']=$request->paid;
        $input['name']=$request->name;
        $input['date']=$request->date;
        $input['time']=$request->time;
        $input['amount']=$request->amount;
        $input['code_id']=$request->code_id;
        $payment = Payment::create($input);
        
        $in['orderID']=$request->orderID;
        $in['status']=1;
        $status = Status::create($in);

        $order = Order::findOrFail($request->orderID);
        $inp=$request->all();
        $order->status=1;
        $order->paymentID=$payment->id;
        $order->status=$status->id;
        $order->date=$request->d;
        $order->update($inp);

        $userID = Auth::user()->id;
        $new['userID']=$userID;
        $new['status']=0;
        $new['list']=0;
        $new['paymentID']=0;
        $new['date']="00/00/0000";
        Order::create($new);

        return redirect('/status/order/'.$request->orderID);
    }

    public function AddressUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input['name']=$request->name;
        $input['email']=$user->email;
        $input['academy']=$user->academy;
        $input['address']=$request->address;
        $input['telephone']=$user->telephone;
        $user->update($input);
        return redirect('/cash');
    }
}
