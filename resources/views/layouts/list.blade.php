@extends('layouts.app')
@inject('ThaiDateHelper', 'App\Services\ThaiDateHelperService')
<!doctype html>
<html lang="en">
    
  <body class="bg-light">
  <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
    <div class="row">
        <div class="col-md-10">
        <br><br>
            <h3><span class="item-number ">คำสั่งซื้อทั้งหมด</span></h3>
        </div>
    </div>
    <br>
    <ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-sm">
    <table class="table">
        <tr>
            <td align="center">รหัสคำสั่งซื้อ</td>
            <td align="center">สั่งซื้อวันที่</td>
            <td align="center">ภาพสินค้า</td>
            <td align="center">รายละเอียดสินค้า</td>
            <td align="center">ส่วนลด</td>
            <td align="center">รวม</td>
            <td align="center">สถานะ</td>
        </tr>
    @if($orders>0)
        @foreach($orders as $order)
        @if($order->paymentID>0)
        
            @foreach($status as $s)
                @foreach($users as $user)
                    @if($order->status==$s->id && $user->id==$userID && $order->userID==$userID )
            <tr>
                <td align="center">{{$order->id}}</td>
                <td align="center">{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td>

                
                    @if($order->userID==$userID)
                <td align="center">
                        <?php   $total = 0; ?>
                    
                        @foreach($orderdetails as $orderdetail)
                            @foreach($products as $product)
                                @if($product->id==$orderdetail->productID && $order->id==$orderdetail->orderID)

                <img class="img-responsive" src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="150">
                            <br><br>
                                @endif
                            @endforeach
                        @endforeach
                    
                </td>
                <td align="center"><span>
                    
                        @foreach($orderdetails as $orderdetail)
                            @foreach($products as $product)
                                @if($product->id==$orderdetail->productID && $order->id==$orderdetail->orderID && $order->userID==$userID )
                            {{$product->name}}
                            {{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }}
                            จำนวน {{$orderdetail->quantity}}
                            ราคา {{number_format($product->price)}}
                            = {{number_format($product->price*$orderdetail->quantity)}} บาท</span>
                            
                            <br><br><br><br><br>
                                @endif
                            @endforeach
                        
                        @endforeach
                    
                        
                </td>
                    @endif
                        @foreach($payment as $pay)
                            @if($order->paymentID==$pay->id)
                                @if($pay->code_id>0)
                                    <td align="center">{{number_format(-($pay->total-$pay->paid))}} บาท</td>
                                @else
                                    <td align="center"> - </td>
                                @endif
                            <td align="center">{{number_format($pay->paid)}} บาท</td>
                            @endif
                        @endforeach
                       
                

                
                <td align="center">
                    @if($s->status==1)
                        <a href="{{ url('/status/order/'.$order->id)}}">รอการยืนยัน</a>
                    @elseif($s->status==2)
                        <a href="{{ url('/status/order/'.$order->id)}}">ยืนยันคำสั่งซื้อ</a>
                    @elseif($s->status==3)
                        <a href="{{ url('/status/order/'.$order->id)}}">ผลิตสินค้า</a>
                    @elseif($s->status==4)
                        <a href="{{ url('/status/order/'.$order->id)}}">จัดส่งสินค้า</a>
                    @elseif($s->status==5)   
                        <a href="{{ url('/status/order/'.$order->id)}}">ได้รับสินค้า</a><br>
                        <a href="{{ url('/review/order/'.$order->id)}}">ให้คะแนน</a>
                    @elseif($s->status==-1)   
                        <a href="{{ url('/status/order/'.$order->id)}}">ปฏิเสธ</a>
                    @endif
                </td>
            </tr>
            
                    @endif
                   
                @endforeach
            @endforeach
        
        @endif
        @endforeach
    @endif
        
            
    </table>
    </li>
    </ul>
    </div>
  </body>
</html>
