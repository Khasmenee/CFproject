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
				<li class="active">การจัดการผู้ใช้งานระบบ</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">การจัดการผู้ใช้งานระบบ</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

            <div class="col-md-9">
                <h2>ผู้ใช้งานทั้งหมด</h2>
                <h5>กรุณากรอกข้อมูลที่ถูกต้องและครบถ้วนด้วยค่ะ</h5>
            </div>
            <div class="col-md-3">
                @include('includes.error')
                <a href="{{ url('dashboard/users') }}" class="btn btn-primary"> กลับไปยังข้อมูลผู้ใช้ทั้งหมด </a>
            </div>
        </div>

        {!! Form::open(['method' => 'POST', 'action' => 'UserController@store','files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name','ชื่อนามสกุล') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','อีเมล') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','รหัสผ่าน') !!}
                    {!! Form::text('password',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('gender','เพศ') !!}
                    {!! Form::text('gender',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('dateofbirth','วัน/เดือน/ปี เกิด') !!}
                    {!! Form::text('dateofbirth',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address','ที่อยู่') !!}
                    {!! Form::text('address',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('telephone','เบอร์โทร') !!}
                    {!! Form::text('telephone',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'เป็น') !!}
                    {!! Form::select('type',[0=>'บุคคลทั่วไป', 1=>'บุคคลากรสถานศึกษา'], 1, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('academy','สถานศึกษา') !!}
                    {!! Form::text('academy',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lineid','LINE ID') !!}
                    {!! Form::text('lineid',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::label('role','สิทธิ์การใช้งาน') !!}
                        {!! Form::select('role',[2=>'Manager', 1=>'Administrator',0=>'General User'],0,['class'=>'form-control']) !!}
                    <div>
                    <div class="col-md-6">
                        {!! Form::label('status','สถานะบัญชี') !!}
                        {!! Form::select('status',[1=>'Active',0=>'Not Active'],1,['class'=>'form-control']) !!}
                    </div>
                </div>
           
                
                    {!! Form::submit('บันทึกข้อมูลผู้ใช้',['class'=>'btn btn-success']) !!}
                    {!! link_to('dashboard/users',$title = 'ยกเลิก',$attributes = ['class' => 'btn btn-danger'], $secure = null);!!}
                
            {!! Form::close() !!}
            </div></div></div></div>

		
</body>
</html>