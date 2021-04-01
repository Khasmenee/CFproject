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
				<h1 class="page-header">คำสั่งซื้อ</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>คำสั่งซื้อทั้งหมด</h2>
        </div>
 
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">รหัสคำสั่งซื้อ</td>
            <td align="center">ชื่อ</td>
            <td align="center">สถาบัน</td>
            <td align="center">วันที่ เวลา</td>
            <td align="center">สถานะ</td>
        </tr>
        @foreach($orders as $order)
            @foreach($status as $s)
                @foreach($users as $user)
                    @if($order->status==$s->id && $user->id==$order->userID )
            <tr>
                <td align="center">{{$order->id}}</td>
                <td align="center">{{$user->name}}</td>
                <td align="center">{{$user->academy}}</td>
                <td align="center">{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td>
                <td align="center">
                    @if($s->status==1)
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">รอการยืนยัน</a>
                    @elseif($s->status==2)
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">ยืนยันคำสั่งซื้อ</a>
                    @elseif($s->status==3)
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">ผลิตสินค้า</a>
                    @elseif($s->status==4)
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">จัดส่งสินค้า</a>
                    @elseif($s->status==5)   
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">ได้รับสินค้า</a>
                    @elseif($s->status==-1)   
                        <a href="{{ url('/dashboard/order/confirm/'.$order->id)}}">ปฏิเสธ</a>
                    @endif
                </td>
            </tr>
                    @endif
                @endforeach
            @endforeach
        @endforeach
        
            
    </table>
    

    </div></div></div></div>


</body>

</html>