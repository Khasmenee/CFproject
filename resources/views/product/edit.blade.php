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
				<li class="active">การจัดการสินค้า</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">การจัดการสินค้า</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>แก้ไขข้อมูลสินค้า</h2>
            <h5>กรุณากรอกข้อมูลที่ถูกต้องและครบถ้วนด้วยค่ะ</h5>
        </div>
        <div class="col-md-3">
            <a href="{{ url('dashboard/products') }}" class="btn btn-primary"> กลับไปยังข้อมูลสินค้าทั้งหมด </a>
            @include('includes.error')
        </div>     

    {!! Form::model($product,['method'=>'PATCH', 'action'=>['ProductController@update', $product->id], 'files'=>'true']) !!}

            <div class="form-group">
                {!! Form::label('name', 'ชื่อ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::label('cat_id', 'หมวดหมู่') !!}
                    {!! Form::select('cat_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Please select']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('price', 'ราคา') !!}
                    {!! Form::number('price', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', 'ภาพ') !!}
                {!! Form::file('image', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('show', 'ข้อความอธิบายสินค้า') !!}
                {!! Form::textarea('show', null, ['class'=>'form-control', 'rows'=>2]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('detail', 'รายละเอียด') !!}
                {!! Form::textarea('detail', null, ['class'=>'form-control', 'rows'=>5]) !!}
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::label('instock', 'สต๊อกสินค้า') !!}
                    {!! Form::select('instock', [1=>'In Stock', 0=>'Out of Stock'], 1, ['class'=>'form-control']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('status', 'สถานะสินค้า') !!}
                    {!! Form::select('status', [1=>'Active', 0=>'Not Active'], 1, ['class'=>'form-control']) !!}
                </div>
            </div>       
      
            {!! Form::submit('บันทึกสินค้า', ['class'=>'btn btn-success']) !!}
            {!! link_to('dashboard/products', $title = 'ยกเลิก', $attributes = ['class'=>'btn btn-danger'], $secure = null);!!}
        
    </div>
    {!! form::close()!!}
    </div></div></div></div>
		
</body>
</html>