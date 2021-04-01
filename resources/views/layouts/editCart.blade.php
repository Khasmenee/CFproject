@extends('layouts.app')
<!DOCTYPE html>
<html>
<body class="bg-light">
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
    <br>

        <div class="row">
            <div class="col-md-10">
                <h3><span class="item-number ">แก้ไขรายละเอียดสินค้า</span></h3>
            </div>
        </div>
    <br>
    <form action="{{ url('/quantity/update/'.$orderdetails[0]->id)}}" method = "POST">
              {{csrf_field()}}
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
            <td align="center">รายละเอียดอื่น ๆ (ถ้ามี)</td>
        </tr>
        
        @if(count($orders)>0)
            @foreach($orders as $order)
                @foreach($orderdetails as $orderdetail)
                    @foreach($products as $product)
                        @if($product->id==$orderdetail->productID && $order->id==$orderdetail->orderID && $order->userID==$userID )
                            
        <tr>
            <td align="center">{{$product->id}}</td>
            <td align="center"><img class="img-responsive" src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="300"></td>
            <td align="center">{{$product->name}}</td>
            <td align="center">{{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }}</td>
            <td align="center">{{number_format($product->price,2)}} x</td>
            <td align="center">
            <input type="text" class="form-control input-sm" name="quantity" size="1" value="{{$orderdetail->quantity}}"></td>
            <td align="center">
            <input type="text" class="form-control input-sm" name="detail" size="1" value="{{$orderdetail->detail}}"></td>  
        </tr>
                            
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        @endif   
      
    </table>

          </li>
        </ul>
        
        <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>                   
                <a class="btn btn-danger" href="{{ url('/cart') }}">ยกเลิก</a>
            </div>
        </div>
        </form>
        <br><br>
</body>
</html>
