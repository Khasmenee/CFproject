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
				<li class="active">การจัดการหมวดหมู่สินค้า</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">การจัดการหมวดหมู่สินค้า</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>รายละเอียดสินค้า</h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{ url('dashboard/products') }}">กลับไปยังหน้าสินค้า</a>
        </div>

    <table class="table">
        @if(count($products)>0)
            @foreach($products as $product)
        <tr>
            <td style="background-color:#f3f3f3">ลำดับ</td>
            <td>{{ $product->id }}</td>
        </tr>
        
        <tr>
            <td style="background-color:#f3f3f3">ภาพ</td>
            <td><img src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="150"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ชื่อ</td>
            <td>{{ $product->name }}</td>
        </tr>
        
        <tr>
            <td style="background-color:#f3f3f3">ราคา</td>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ข้อความอธิบายสินค้า</td>
            <td>{{ $product->show }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td>{{ $product->detail }}</td>
        </tr>
        
        <tr>
            <td style="background-color:#f3f3f3">สถานะ</td>
            <td>{{ $product->instock === 1 ? "In Stock" : "Out of Stock" }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สถานะ</td>
            <td>{{ $product->status === 1 ? "Active" : "Not Active" }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สร้างเมื่อวันที่</td>
            <td>{{ $product->created_at }} </td>
        </tr>
        @endforeach
        @else
            <tr colspan="3">
                <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif
    </table>

    </div></div></div></div>
		
</body>
</html>
