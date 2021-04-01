@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<body class="bg-light">
  <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">

<form action="{{ url('/SendToCart/Complete')}}" method = "POST">
              {{csrf_field()}}
<center>
        <div class="col-lg-5">
        <div class="card mt-5">
        <div class="card-body">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-3">การจองบริการเช่า-ซื้อครบวงจร</h4>
                </h4>
            
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>การใช้บริการเช่า-ซื้อครบวงจรจำเป็นต้องเช่า-ซื้อ ชุดครุย และ แฟ้มรับประกาศนียบัตร ไม่ต่ำกว่า 100 ชุด 100 เล่ม
                            และใช้บริการถ่ายภาพจากร้านคาเมร่าจวบจนใช้บริการนำรูปรับรูปหมู่ที่ได้ใส่กรอบกับทางร้าน ซึ่งลูกค้าจะได้รับสิทธิพิเศษเช่าฟรี
                            โต๊ะพิธีมอบ ซุ้มดอกไม้ พรหมและอัฒจันทร์ได้อย่างครบวงจร
                        </span>
                    </li>    
                </ul>
                @if(Session::has('alert_quantity'))
                <div class="alert alert-danger">
                {{ session('alert_quantity')}}
                </div>
                @endif
            
               
            
@if(count(array($category))>0 && count(array($products))>0)
    @foreach($category as $cat)

        @if($cat->name=="ชุดครุย")
  
            <label for="product1" class="form-label">ชุดครุย</label>
                <select class=" form-control" name = "product1" required>
                @foreach($products as $product)
                    @if($product->cat_id==$cat->id)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endif
                @endforeach
                </select>
            
                <label for="quantity1" class="form-label">จำนวน</label>
                <input type="text" class="form-control" name="quantity1" value="100">
                <label for="detail1" class="form-label">กรุณาระบุขนาด S M L XL</label>
                <input type="text" class="form-control" name="detail1" value="S:20 M:30 L30 XL:20">
        @endif
            <br>
        @if($cat->name=="แฟ้มรับประกาศนียบัตร")
              <label for="product2" class="form-label">แฟ้มรับประกาศนียบัตร</label>
                <select id="type" class=" form-control" name = "product2" required>
                @foreach($products as $product)
                    @if($product->cat_id==$cat->id)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endif
                @endforeach
                </select>
                <label for="quantity2" class="form-label">จำนวน</label>
                <input type="text" class="form-control" name="quantity2" value="100">
                <label for="detail2" class="form-label">กรุณาระบุขนาด A1 A2 A3 A4 A5</label>
                <input type="text" class="form-control" name="detail2" value="A5">
     
        @endif
    @endforeach

                <label for="date" class="form-label">วันที่จัดพิธีมอบประกาศนียบัตร</label>
                <input type="text" class="form-control" name="date" placeholder="00/00/0000" required>
                <br>
                
                @if($orders>0)
                    @foreach($orders as $order)
                        @if($order->userID==$userID)
                            @if($order->paymentID==0)
                                <input type="hidden" name="orderID" value="{{$order->id}}">
                            @endif
                        @endif
                    @endforeach
                @else
                    <input type="hidden" name="orderID" value="0">
                @endif


                <button type="submit" class="btn btn-primary">ยืนยัน</button>                     
                <a class="btn btn-danger" href="{{ url('/home') }}">ยกเลิก</a>
        </div>
        </div>
        </div>
    
@else
    <h4 class="mb-3">ไม่มีข้อมูลที่ต้องการในขณะนี้</h4>
@endif
         
</center>
</form>
 

</div>
</body>

</html>
