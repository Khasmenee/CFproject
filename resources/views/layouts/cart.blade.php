@extends('layouts.app')
<!DOCTYPE html>
<html>
<body class="bg-light">
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
        <div class="py-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="100" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
            <h2>ตะกร้าสินค้า</h2>
        </div>
        <form action="{{ url('/CartToCash')}}" method = "POST">
              {{csrf_field()}}
        <div class="row">
            <div class="col-md-10">
        @if(count($orders)>0)
            @foreach($orders as $order)
                @if($order->userID==$userID)
                    @if($order->paymentID==0)
                        @if($order->list>0)
                            <h3><span class="item-number ">สินค้าในตะกร้า [ {{$order->list}} ]</span></h3>
                            <input type="hidden" name="list" value="{{$order->list}}">
                        @elseif($order->list==0)
                            <h3><span class="item-number ">ไม่มีสินค้าในตะกร้า [ 0 ]</span></h3>
                            <input type="hidden" name="list" value="{{$order->list}}">
                        @endif
                    @endif
                @endif
            @endforeach
        @else
                <h3><span class="item-number ">ไม่มีสินค้าในตะกร้า [ 0 ]</span></h3>
                <input type="hidden" name="list" value="0">
        @endif
        

            </div>
            <div class="col-md-2">   
                <a class="btn btn-primary" href="{{ url('/home') }}">ชมสินค้าต่อ</a>
            </div>
        </div>
    <br>
    @if(Session::has('alert_no_product_in_cart'))
      <br>
    <div class="alert alert-danger">
        {{ session('alert_no_product_in_cart')}}
    </div>
    @endif
            
    <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
          <table class="table">
        <tr>
            <td align="center">รหัสสินค้า</td>
            <td align="center">ภาพ</td>
            <td align="center">ชื่อสินค้า</td>
            <td align="center">ประเภท</td>
            <td align="center">ราคาต่อหน่วย (บาท)</td>
            <td align="center">จำนวน</td>
            <td align="center">รวมราคา</td>
            <td align="center">รายละเอียดอื่น ๆ (ถ้ามี)</td>
            <td align="center"></td>
            <td align="center"></td>
        </tr>
        <?php   $total = 0; ?>
        @if(count($orders)>0)
            @foreach($orders as $order)
                @if($order->paymentID==0)
                    @foreach($orderdetails as $orderdetail)
                        @foreach($products as $product)
                            @if($product->id==$orderdetail->productID && $order->id==$orderdetail->orderID && $order->userID==$userID )
                            
        <tr>
            <td align="center">{{$product->id}}</td>
            <td align="center"><img class="img-responsive" src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="150"></td>
            <td align="center">{{$product->name}}</td>
            <td align="center">{{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }}</td>
            <td align="center">{{number_format($product->price,2)}} x</td>
            <td align="center">{{$orderdetail->quantity}}</td>
            <td align="center">{{number_format($product->price*$orderdetail->quantity,2)}} บาท</td>
            <?php  $total = $total+($product->price*$orderdetail->quantity);  ?>
            <td align="center">{{$orderdetail->detail}}</td>
            <td align="center">
                <a href="{{ url('/cart/edit/'.$orderdetail->id) }}" class="btn btn-success"> แก้ไข </a>
            </td>
            <td align="center">
                <a href="{{ url('/cart/delete/'.$orderdetail->id.'/'.$order->id) }}" onclick="return confirm('ต้องการที่จะลบข้อมูลนี้หรือไม่ ?')" class="btn btn-danger">ลบ</a>
            </td>
            
  
        </tr>
                            
                            @endif
                        @endforeach
                    @endforeach
                @endif
            @endforeach
        @endif   
        <tr>
            <td align="center"><h5><span class="item-number ">รวม</span></h5></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="center"><h5><span class="item-number ">{{number_format($total)}} บาท</span></h5></td>
            
  
        <tr>
      
    </table>

          </li>
        </ul>
        
        <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>                     
                <a class="btn btn-danger" href="{{ url('/home') }}">ยกเลิก</a>
            </div>
        </div>
        </form>
        <br><br>
</body>
</html>
