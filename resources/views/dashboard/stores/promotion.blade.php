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
				<li class="active">โปรโมชั่น</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">โปรโมชั่น</h1>
			</div>
		</div><!--/.row-->
		

    <div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

    <div class="col-md-9">
            <h2>รายละเอียดโปรโมชั่น</h2>
    </div>

    <a class="btn btn-primary" href="{{ url('/dashboard/promotion/new') }}">เพิ่มโค้ดโปรโมชั่น</a>
    
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">ลำดับ</td>
            <td align="center">รหัสส่วนลด</td>
            <td align="center">รายละเอียด</td>
            <td align="center">ส่วนลดที่ได้รับ (%)</td>
            <td align="center">ยอดสั่งซื้อขั้นต่ำ</td>
            <td align="center">สิ้นสุดโปรโมชั่น</td>
            <td align="center"></td>
            <td align="center"></td>
        </tr>
        
        @if(count($promotion)>0)
            @foreach($promotion as $promotion)
            <tr>
            <td align="center">{{ $promotion->id }}</td>
                <td align="center">{{ $promotion->code }}</td>
                <td align="center">{{ $promotion->detail }} </td>
                <td align="center">{{ $promotion->discount }} </td>
                <td align="center">{{ $promotion->sale }} </td>
                <td align="center">{{ $promotion->date }} </td>
                <td align="center"><a href="{{ url('/dashboard/promotion/edit/'.$promotion->id) }}" class="btn btn-primary"> แก้ไข </a></td>
                <td align="center"><a href="{{ url('/dashboard/promotion/delete/'.$promotion->id) }}" onclick="return confirm('ต้องการที่จะลบข้อมูลนี้หรือไม่ ?')" class="btn btn-danger"> ลบ </a></td>
            </tr>
            @endforeach
        @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif

    </table>
    </div></div></div></div>

    <br><br>

    

		
</body>
</html>
