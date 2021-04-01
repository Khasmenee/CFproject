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
            <h2>แก้ไขหัวข้อโฮมเพจที่ {{$topic_homepage[0]->id}}</h2>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/dashboard/store') }}" class="btn btn-primary"> กลับไปยังข้อมูลร้านค้า </a>
        </div>
    
    <form action="{{ url('/dashboard/topic/update/'.$topic_homepage[0]->id) }}" method="post">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">หัวข้อ</td>
            <td><input type="text" name="topic" class="form-control" value="{{ $topic_homepage[0]->topic }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td><textarea name="detail" class="form-control">{{ $topic_homepage[0]->detail }}</textarea></td>
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
