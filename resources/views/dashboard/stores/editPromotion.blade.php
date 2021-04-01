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
            <h2>แก้ไขโปรโมชั่น</h2>
        </div>
    
    <form action="{{ url('/dashboard/promotion/update/'.$promotion->id) }}" method="post">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">รหัสส่วนลด</td>
            <td><input type="text" name="code" class="form-control" value="{{ $promotion->code }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td><textarea name="detail" class="form-control">{{ $promotion->detail }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ส่วนลดที่ได้รับ (%)</td>
            <td><input type="text" name="discount" class="form-control" value="{{ $promotion->discount }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ยอดสั่งซื้อขั้นต่ำ</td>
            <td><input type="text" name="sale" class="form-control" value="{{ $promotion->sale }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">สิ้นสุดโปรโมชั่น</td>
            <td><input type="text" name="date" class="form-control" value="{{ $promotion->date }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3"></td>
            <td>
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a href="{{ url('/dashboard/promotion') }}" class="btn btn-danger">ยกเลิก</a>
            </td>
        </tr>
    </table>
    </form>
    </div></div></div></div>

		
</body>
</html>
