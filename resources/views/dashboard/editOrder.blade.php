@extends('layouts.dashboard')
@inject('ThaiDateHelper', 'App\Services\ThaiDateHelperService')
<!DOCTYPE html>
<html>
<body>
    
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">คำสั่งซื้อ</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">รายละเอียดคำสั่งซื้อ</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>รายละเอียดคำสั่งซื้อ</h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{ url('/dashboard/admin/order') }}">กลับไปยังคำสั่งซื้อทั้งหมด</a>
        </div>

    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">หมายเลขคำสั่งซื้อ</td>
            <td>{{$orders[0]->id}}</td>
            <td style="background-color:#f3f3f3">สั่งซื้อเมื่อวันที่</td>
            @foreach($status as $s)
                @if($orders[0]->id==$s->orderID && $s->status==1)
                    <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td>
                @endif
            @endforeach

        </tr>
        @foreach($users as $user)
            @foreach($payment as $pay)
                @if($orders[0]->userID==$user->id && $orders[0]->paymentID==$pay->id)
        <tr>
            <td style="background-color:#f3f3f3">ชื่อ</td>
            <td>{{$user->name}}</td>
            <td style="background-color:#f3f3f3">รูปแบบการชำระเงิน</td>
            <td>โอนเงินผ่านบัญชีธนาคาร</td>
            
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ที่อยู่</td>
            <td>{{$user->address}}</td>
            <td style="background-color:#f3f3f3">ชื่อผู้โอน</td>
            <td>{{$pay->name}}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">เบอร์โทร</td>
            <td>{{$user->telephone}}</td>
            <td style="background-color:#f3f3f3">วันที่โอนเงิน</td>
            <td>{{$pay->date}}</td>
            
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สถาบัน</td>
            <td>{{$user->academy}}</td>
            <td style="background-color:#f3f3f3">เวลาโอนเงิน</td>
            <td>{{$pay->time}} น.</td>
        </tr>
        <td style="background-color:#f3f3f3">รับสินค้าภายในวันที่</td>
            <td><input type="text" name="date" class="form-control" value="{{$orders[0]->date}}"></td>
            <td style="background-color:#f3f3f3">ยอดเงิน</td>
            <td>{{number_format($pay->amount)}} บาท</td>
            </td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">หลักฐานการโอนเงิน</td>
            <td><img src="{{ url($pay->image ? "uploads/images/".$pay->image : "http://placehold.it/150x150") }}" width="150">
            </td>
        </tr>
                
    
</table>
<div class="col-md-7 col-lg-3">
      <h3 class="mb-3">ยอดที่ต้องชำระ</h3>
        @if($pay->total<=5000)
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <span>จำนวน</span>
                <strong>{{number_format($pay->paid)}} บาท</strong>
                
            </li>  
        </ul>
        @else
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <span>ยอดมัดจำ 25% </span>
                <strong>{{number_format(($pay->paid*25)/100)}} บาท</strong>
            </li>  
            <li class="list-group-item d-flex justify-content-between">
                <span>ยอดค้างชำระ</span>
                <strong>{{number_format($pay->paid-(($pay->paid*25)/100))}} บาท</strong>
            </li>  
            <li class="list-group-item d-flex justify-content-between">
                <span>รวม</span>
                <strong>{{number_format($pay->paid)}} บาท</strong>
            </li>  
        </ul>
        @endif
</div>
                @endif
            @endforeach
        @endforeach


    <div class="col-md-5">
    <h3> รายละเอียดสินค้า</h3>
    </div>

    <div class="row justify-content-center">
    <div class="row">
        <div class="col-md-8">
        <ul class="list-group mb-0">
            <li class="list-group-item d-flex justify-content-between">
                    <table class="table">
                        <tr style="background-color=:#f3f3f3">
                            <td align="center">รหัสสินค้า</td>
                            <td align="center">ภาพ</td>
                            <td align="center">ชื่อสินค้า</td>
                            <td align="center">ประเภท</td>
                            <td align="center">ราคาต่อหน่วย</td>
                            <td align="center">จำนวน</td>
                            <td align="center">รายละเอียดอื่น ๆ (ถ้ามี)</td>
                            <td align="center">ราคา</td>
                        </tr>
                        <?php   $total = 0; ?>
                        @foreach($orderdetails as $orderdetail)
                            @foreach($products as $product)
                                @foreach($users as $user)
                                    @if($product->id==$orderdetail->productID && $orders[0]->id==$orderdetail->orderID && $orders[0]->userID==$user->id )
                        <tr>
                            <td align="center">{{$product->id}}</td>
                            <td align="center"><img class="img-responsive" src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="150"></td>
                            <td align="center">{{$product->name}}</td>
                            <td align="center">{{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }}</td>
                            <td align="center">{{number_format($product->price)}}</td>
                            <td align="center">จำนวน {{$orderdetail->quantity}}</td>
                            <td align="center">{{$orderdetail->detail}}</td>
                            <td align="center">{{number_format($product->price*$orderdetail->quantity)}} บาท</td> 
                            <?php  $total = $total+($product->price*$orderdetail->quantity);  ?>
                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        <tr>
                            <td align="center">รวม</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <strong>
                            <td align="center">{{number_format($total)}} บาท</td> 
                        </tr>
                    </table>
                    <table class="table">
            @foreach($payment as $pay)
                @if($orders[0]->paymentID==$pay->id)
                    @foreach($promotion as $promo)
                        @if($promo->id==$pay->code_id)
        <tr>
            <td style="background-color:#f3f3f3">โค๊ดส่วนลด {{$promo->code}} ลด {{ $promo->discount }}%</td>
            <td>{{number_format(-($pay->total*$promo->discount)/100)}} บาท</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">จำนวนเงินทั้งหมด</td>
            <td>{{number_format($pay->paid)}} บาท</td>
        </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
                    </table>
            </li>    
        </ul>
        </div>
    </div>
</div>      

    <div class="col-md-9">
            <h4>สถานะคำสั่งซื้อ : 
            @foreach($status as $s)
                @if($orders[0]->status==$s->id)
                    @if($s->status==1)
                        รอการยืนยัน</h4>
                    @elseif($s->status==2)
                        ยืนยันคำสั่งซื้อ</h4>
                    @elseif($s->status==3)
                        ผลิตสินค้า</h4>
                    @elseif($s->status==4)
                        จัดส่งสินค้า</h4>
                    @elseif($s->status==5)   
                        ได้รับสินค้า</h4>
                    @elseif($s->status==-1)   
                        ปฏิเสธ</h4>
                    @endif
                @endif
            @endforeach

    </div>
    @foreach($status as $s)
        @if($orders[0]->status==$s->id && $s->status>0)
    <center>
    <br> 
    
           
         <br>
         <button type="submit" onclick="return confirm('ต้องการยืนยันสถานะคำสั่งซื้อนี้หรือไม่ ?')" class="btn btn-primary">ยืนยัน</button>
        <a href="{{ url('/dashboard/order') }}" class="btn btn-danger">ยกเลิก</a>
   
    </center>
     
            @else
            @endif
            @endforeach
    <br><br><br>
    </div></div></div></div>
    
    
</body>
</html>
