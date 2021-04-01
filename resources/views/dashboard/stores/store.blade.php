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
            <h2>รายละเอียดข้อมูลร้านค้า</h2>
        </div>
        @if(count($store)>0)
            @foreach($store as $st)
        <a class="btn btn-primary" href="{{ url('/dashboard/store/editStore/'.$st->id) }}">แก้ไข</a>

        <table class="table">
        
        <tr>
            <td style="background-color:#f3f3f3">ชื่อร้านค้า</td>
            <td>{{ $st->store_name }}</td>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td>{{ $st->detail }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ผู้จัดการ</td>
            <td>{{ $st->manager_name }}</td>
            <td style="background-color:#f3f3f3">ผู้ดูแลเว็บไซต์</td>
            <td>{{ $st->Admin_name }}</td>
        </tr>
        <tr>
        <td style="background-color:#f3f3f3">ภาพ (700 x 450 pixels)</td>
            
        <td><img src="{{ url($st->image ? "uploads/images/".$st->image : "http://placehold.it/700x450") }}" width="300"></td>
            
            <td style="background-color:#f3f3f3">ที่อยู่</td>
            <td>{{ $st->address }}</td>
        </tr>
        <tr>
        <td style="background-color:#f3f3f3">เบอร์โทร</td>
            <td>{{ $st->telephone }}</td>
            <td style="background-color:#f3f3f3">Line ID</td>
            <td>{{ $st->line_id }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">Facebook Page</td>
            <td>{{ $st->facebook_page }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">หัวข้อผลงาน</td>
            <td>{{ $st->topic_workings }}</td>
            <td style="background-color:#f3f3f3">หัวข้อหลักโฮมเพจ</td>
            <td>{{ $st->topic_homepage }}</td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพสไลด์ที่ 1</td>
            <td><img src="{{ url($st->slide_image1 ? "uploads/images/".$st->slide_image1 : "http://placehold.it/1900x1080") }}" width="300"></td>
            <td style="background-color:#f3f3f3">ภาพสไลด์ที่ 2</td>
            <td><img src="{{ url($st->slide_image2 ? "uploads/images/".$st->slide_image2 : "http://placehold.it/1900x1080") }}" width="300"></td>
            
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพสไลด์ที่ 3</td>
            <td><img src="{{ url($st->slide_image3 ? "uploads/images/".$st->slide_image3 : "http://placehold.it/1900x1080") }}" width="300"></td>
            <td></td>
            <td></td>
        </tr>

        @endforeach
        @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif
    </table>
    </div></div></div></div>

    <div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

    <div class="col-md-9">
            <h2>หัวข้อโฮมเพจ</h2>
    </div>

    
    
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">ลำดับ</td>
            <td align="center">หัวข้อ</td>
            <td align="center">รายละเอียด</td>
            <td align="center"></td>
        </tr>
        
        @if(count($topic_homepage)>0)
            @foreach($topic_homepage as $top)
            <tr>
            <td align="center">{{ $top->id }}</td>
                <td align="center">{{ $top->topic }}</td>
                <td align="center">{{ $top->detail }} </td>
                <td align="center"><a href="{{ url('/dashboard/store/editTopic/'.$top->id) }}" class="btn btn-primary"> แก้ไข </a></td>
            </tr>
            @endforeach
        @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif

    </table>
    </div></div></div></div>

    <div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">
    <div class="col-md-9">
            <h2>ผลงาน</h2>
    </div>

    
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">ลำดับ</td>
            <td align="center">ชื่อ</td>
            <td align="center">สถาบัน</td>
            <td align="center">ภาพ (700 x 400 pixels)</td>
            <td align="center">รายละเอียด</td>
            <td align="center"></td>
        </tr>
            <tr>
            @if(count($workings)>0)
              @foreach($workings as $work)
            <td align="center">{{ $work->id }}</td>
                <td align="center">{{ $work->name }}</td>
                <td align="center">{{ $work->academy }}</td>
                <td align="center"><img src="{{ url($work->image ? "uploads/images/".$work->image : "http://placehold.it/700x400") }}" width="150"></td>
                <td align="center">{{ $work->detail }}</td>
                <td align="center"><a href="{{ url('/dashboard/store/editWorkings/'.$work->id) }}" class="btn btn-primary"> แก้ไข </a></td>
            </tr>
              @endforeach
            @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
            @endif

    </table>
    </div></div></div></div>

    

		
</body>
</html>
