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
            <h2>รายละเอียดหมวดหมู่สินค้า</h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{ url('dashboard/categories') }}">กลับไปยังหมวดหมู่สินค้า</a>
        </div>

    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">ลำดับ</td>
            <td>{{ $category->id }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ชื่อ</td>
            <td>{{ $category->name }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td>{{ $category->detail }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพหมวดหมู่สินค้า</td>
            <td><img src="{{ url($category->caticon['name'] ? "uploads/images/".$category->caticon['name'] : "images/nophoto.jpg") }}" width="150"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สถานะ</td>
            <td>{{ $category->type === 1 ? "ซื้อ" : "เช่า" }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สถานะ</td>
            <td>{{ $category->status === 1 ? "Active" : "Not Active" }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สร้างเมื่อวันที่</td>
            <td>{{ $category->created_at }} </td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">การจัดการ</td>
            <td>
                <a href="{{ url('dashboard/categories/edit/'.$category->id) }}" class="btn btn-success"> แก้ไข </a>
                <a href="{{ url('dashboard/categories/delete/'.$category->id) }}" onclick="return confirm('ต้องการที่จะลบข้อมูลนี้หรือไม่ ?')" class="btn btn-danger">ลบ</a>
            </td>
        </tr>
    </table>
    <div class="col-md-9">
    <h2> สินค้าในหมวดหมู่ "{{ $category->name }}"</h2>
    </div>
    <table class="table">
        <tr style="background-color=:#f3f3f3">
            <td>ลำดับ</td>
            <td>ภาพสินค้า</td>
            <td>ชื่อสินค้า</td>
            <td>คำแนะนำสินค้า</td>
            <td>รายละเอียดสินค้า</td>
        </tr>
        @if(count($category->products)>0)
        @foreach($category->products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="100"></td>
            <td> {{ $product->name }} ราคา {{ $product->price }} บาท</td>
            <td>{{ $product->show }}</td>
            <td>{{ $product->detail }}</td>
        </tr>
        @endforeach
        @else 
            <tr>
                <td colspan="3">ไม่มีข้อมูลสินค้าในขณะนี้</td>
            </tr>
        @endif
    </table>
    <br>

    </div></div></div></div>
		
</body>
</html>
