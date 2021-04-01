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
            <h2>หมวดหมู่สินค้าทั้งหมด</h2>
        </div>
       
        <a class="btn btn-primary" href="{{ url('/dashboard/categories/new') }}">เพิ่มหมวดหมู่สินค้า</a>
        
    
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">ลำดับ</td>
            <td align="center">ภาพ</td>
            <td align="center">ประเภท</td>
            <td align="center">ชื่อ</td>
            <td align="center">รายละเอียด</td>
        </tr>
        @if(count($categories)>0)
            @foreach($categories as $category)
            <tr>
                <td align="center">{{ $category->id }}</td>
                <td align="center"><img src="{{ url($category->caticon['name'] ? "uploads/images/".$category->caticon['name'] : "images/nophoto.jpg") }}" width="150"></td>
                <td align="center">{{ $category->type === 1 ? "ซื้อ" : "เช่า" }}</td>
                <td align="center"><a href="{{ url('dashboard/categories/show/'.$category->id)}}">{{ $category->name }}</a></td>
                <td align="center">{{ $category->detail }} </td>
            </tr>
            @endforeach
        @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif
    </table>
    {{ $categories->render() }}

    </div></div></div></div>

		
</body>
</html>
