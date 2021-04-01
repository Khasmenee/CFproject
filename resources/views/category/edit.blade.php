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
            <h2>แก้ไขหมวดหมู่สินค้า</h2>
        </div>
        <div class="col-md-3">
            <a href="{{ url('dashboard/categories') }}" class="btn btn-primary"> กลับไปยังหมวดหมู่สินค้าทั้งหมด </a>
        </div>
    
    <form action="{{ url('/dashboard/categories/update/'.$category->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">ชื่อ</td>
            <td><input type="text" name="name" class="form-control" value="{{ $category->name }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td><textarea name="detail" class="form-control">{{ $category->detail }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพหมวดหมู่สินค้า</td>
            <td><input type="file" name="photo_id" class="form-control"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ประเภท</td>
            <td>
                <select name="type" class="form-control">
                    <option value="0">เช่า</option>
                    <option value="1">ซื้อ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สถานะ</td>
            <td>
                <select name="status" class="form-control">
                    <option value="0" {{ $category->status === 0 ? "selected" : "" }}> ไม่ได้รับการยืนยัน </option>
                    <option value="1" {{ $category->status === 1 ? "selected" : "" }}> ยืนยันแล้ว </option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3"></td>
            <td>
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a href="{{ url('/dashboard/categories') }}" class="btn btn-danger">ยกเลิก</a>
            </td>
        </tr>
    </table>
    </form>
    </div></div></div></div>

		
</body>
</html>
