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
				<li class="active">ข้อมูลร้านค้า</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">ข้อมูลร้านค้า</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>แก้ไขข้อมูลร้านค้า</h2>
        </div>
        <div class="col-md-3">
            <a href="{{ url('dashboard/store') }}" class="btn btn-primary"> กลับไปยังข้อมูลร้านค้า </a>
        </div>

    <form action="{{ url('/dashboard/store/update/'.$store[0]->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">ชื่อร้านค้า</td>
            <td><input type="text" name="store_name" class="form-control" value="{{ $store[0]->store_name }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td><textarea name="detail" class="form-control">{{ $store[0]->detail }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ผู้จัดการ</td>
            <td><input type="text" name="manager_name" class="form-control" value="{{ $store[0]->manager_name }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ผู้ดูแลเว็บไซต์</td>
            <td><input type="text" name="Admin_name" class="form-control" value="{{ $store[0]->Admin_name }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (700 x 450 pixels)</td>
            <td><input type="file" name="image" class="form-control"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ที่อยู่</td>
            <td><textarea name="address" class="form-control">{{ $store[0]->address }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">เบอร์โทร</td>
            <td><input type="text" name="telephone" class="form-control" value="{{ $store[0]->telephone }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">Line ID</td>
            <td><input type="text" name="line_id" class="form-control" value="{{ $store[0]->line_id }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">Facebook Page</td>
            <td><input type="text" name="facebook_page" class="form-control" value="{{ $store[0]->facebook_page }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">หัวข้อหลักโฮมเพจ</td>
            <td><input type="text" name="topic_homepage" class="form-control" value="{{ $store[0]->topic_homepage }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">หัวข้อหลักผลงาน</td>
            <td><input type="text" name="topic_workings" class="form-control" value="{{ $store[0]->topic_workings }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (1900 x 1080 pixels)</td>
            <td><input type="file" name="slide_image1" class="form-control"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (1900 x 1080 pixels)</td>
            <td><input type="file" name="slide_image2" class="form-control"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (1900 x 1080 pixels)</td>
            <td><input type="file" name="slide_image3" class="form-control"></td>
        </tr>
        
        <tr>
            <td style="background-color:#f3f3f3"></td>
            <td>
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a href="{{ url('/dashboard/store') }}" class="btn btn-danger">ยกเลิก</a>
            </td>
        </tr>
    </table>
    </form>

    </div></div></div></div>

		
</body>
</html>
