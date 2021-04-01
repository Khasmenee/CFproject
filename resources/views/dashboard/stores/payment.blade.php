@extends('layouts.dashboard')
<!DOCTYPE html>
<html>
<body>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">ข้อมูลการชำระเงิน</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">ข้อมูลการชำระเงิน</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">
    
        <div class="col-md-9">
            <h2>รายละเอียดการชำระเงิน</h2>
        </div>
        @if(count($store)>0)
            @foreach($store as $store)
        <a class="btn btn-primary" href="{{ url('/dashboard/payment/edit/'.$store->id) }}">แก้ไข</a>

        <table class="table">
        
        <tr>
            <td style="background-color:#f3f3f3">ข้อความ</td>
            <td>{{ $store->payment_show }}</td>
        </tr>
        <tr>    
            <td style="background-color:#f3f3f3">หัวข้อ</td>
            <td>{{ $store->payment_topic }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td>{{ $store->detail }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (400 x 150 pixels)</td>
        <td><img src="{{ url($store->bank_image ? "uploads/images/".$store->bank_image : "http://placehold.it/400x150") }}" width="300"></td>
            
        </tr>
        @endforeach
        @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif
    </table>

    <!-- 1.ลูกค้าต้องชำระเงินยอดมัดจำอย่างน้อย 25 % ของยอดคำสั่งซื้อเพื่อเป็นการยืนยันคำสั่งซื้อ

2.ลูกค้าสามารถชำระเงินยอดค้างชำระได้ตั้งแต่วันที่สั่งสินค้าถึงวันที่ได้รับสินค้า

3.หากสินค้าที่เช่า-ซื้อมีการจองซ้ำซ้อนกันในวันดังกล่าวที่ลูกค้าต้องการ ทางร้านค้าจะทำการปฏิเสธคำสั่งซื้อและโอนยอดมัดจำคืนภายใน 7 วันทำการ
    -->

    </div></div></div></div>

    <br><br>

		
</body>
</html>
