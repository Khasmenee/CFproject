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
            <h2>แก้ไขการชำระเงิน</h2>
        </div>
        
        <form action="{{ url('/dashboard/payment/update/'.$store->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td style="background-color:#f3f3f3">ข้อความ</td>
            <td><textarea name="payment_show" class="form-control">{{ $store->payment_show }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">หัวข้อ</td>
            <td><input type="text" name="payment_topic" class="form-control" value="{{ $store->payment_topic }}"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">รายละเอียด</td>
            <td><textarea name="payment_detail" class="form-control">{{ $store->payment_detail }}</textarea></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3">ภาพ (400 x 150 pixels)</td>
            <td><input type="file" name="bank_image" class="form-control"></td>
        </tr>
        <tr>
            <td style="background-color:#f3f3f3"></td>
            <td>
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a href="{{ url('/dashboard/payment') }}" class="btn btn-danger">ยกเลิก</a>
            </td>
        </tr>
    </table>
    </form>

    </div></div></div></div>

    <br><br>

		
</body>
</html>
