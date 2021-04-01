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
		@if(Session::has('add_new_product'))
    <div class="alert alert-info">
        {{ session('add_new_product')}}
    </div>
    @endif
		<div class="panel panel-container">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-12 col-lg-12">
					
						<div class="row no-padding">

        <div class="col-md-9">
            <h2>สินค้าทั้งหมด</h2>
        </div>
        
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{ url('/dashboard/products/create') }}">เพิ่มสินค้า</a>
        </div>
 
    
    <table class="table">
        <tr style="background-color:#f3f3f3">
            <td align="center">ลำดับ</td>
            <td align="center">ภาพ</td>
            <td align="center">ประเภท</td>
            <td align="center">สินค้า</td>
            <td align="center">Action</td>
        </tr>
        @if(count($products)>0)
            @foreach($products as $product)
            <tr>
                <td align="center">{{ $product->id }}
                <div class="row justify-content-center">
                    <a href="{{ url('/dashboard/products/'.$product->id.'/edit') }}" class="btn btn-info">แก้ไข</a>
                </div>
                </td>
                <td align="center"><img src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="100"></td>
                <td align="center">{{ $product->category->type === 1 ? "ซื้อ" : "เช่า" }}</td>
                <td align="center">
                    <a href="{{ url('/dashboard/products/show/'.$product->id)}}">{{ $product->name }}</a>
                    ประจำหมวดหมู่ : {{ $product->category->name }}
                    <div>{{ $product->show }}</div>
                </td>
                <td align="center" onclick="return confirm('ต้องการที่จะลบข้อมูลนี้หรือไม่ ?')">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['ProductController@destroy' , $product->id]]) !!}
                            {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                </td>
                @if(Session::has('destroy_product'))
                    <script type="text/javascript">
                        swal({
                            title: "Good job!",
                            text: "{{session('destroy_product') }}",
                            icon: "success",
                        });
                    </script>
                @endif
            </tr>
            @endforeach
        @else
            <tr colspan="3">
                <td>ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
        @endif
    </table>
    
    {{ $products->render() }}
    </div></div></div></div>
		
</body>
</html>