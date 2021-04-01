<@extends('layouts.dashboard')
@inject('ThaiDateHelper', 'App\Services\ThaiDateHelperService')
<!DOCTYPE html>
<html>
<body>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">วางแผนการจัดการ</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">วางแผนการจัดการ</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
			<div class="panel panel-default">
					<div class="panel-heading">
						สิ่งที่ต้องทำ
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<ul class="todo-list">
					@if(count(array($list))>0)
						@foreach($list as $l)
							<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox-1" />
									<label for="checkbox-1">{{$l->list}}</label>
								</div>
								<div class="pull-right action-buttons"><a href="{{ url('/dashboard/mange/delete/'.$l->id)}}" class="trash"><em class="fa fa-trash"></em></a></div>
							</li>
						@endforeach
					@endif
						</ul>
					</div>
					<div class="panel-footer">
					<form action="{{ url('/dashboard/mange/store')}}" method = "POST" enctype="multipart/form-data"> 
      					{{csrf_field()}}
						<div class="input-group">
							<input type="text" class="form-control" name="list"><span class="input-group-btn">
								<button class="btn btn-primary btn-md" type="submit">เพิ่ม</button>
						</span></div>
					</form>
					</div>
				</div>
				<div class="panel panel-default articles">
					<div class="panel-heading">
						รายละเอียดคำสั่งซื้อ
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body articles-container">
					@foreach($users as $user)
						@foreach($orders as $order)
							@if($user->id==$order->userID)
								@foreach($status as $s)
                    				@if($order->status==$s->id && $s->status>0)
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">{{$order->id}}</div>
										<div class="text-muted">หมายเลขคำสั่งซื้อ</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="{{ url('/dashboard/manage/'.$order->id) }}">{{$user->academy}} {{$user->name}}</a></h4>
										<p>ชุดครุยแถบขาวดำ 100 ชุด สมุดรับประกาศนียบัตร 100 เล่ม</p>
									</div>		
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
									@endif
								@endforeach
							@endif
						@endforeach
					@endforeach
						
											
					</div>
				</div><!--End .articles-->
			</div><!--/.col-->
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						ปฏิทิน
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
				@if($od>0)
					@foreach($users as $user)
						@foreach($orders as $order)
							@if($user->id==$order->userID && $order->id==$od)
				<div class="panel panel-default ">
					<div class="panel-heading">
						สถานะคำสั่งซื้อที่ {{$order->id}} {{$user->academy}} {{$user->name}}
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							@foreach($status as $s)
                    			@if($order->id==$s->orderID && $s->status>1)
							<li>
								<div class="timeline-badge primary"><i class="glyphicon glyphicon-pushpin"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
                    				@if($s->status==2)
										<h4 class="timeline-title">ยืนยันคำสั่งซื้อ</h4>
                    				@elseif($s->status==3)
										<h4 class="timeline-title">ผลิตสินค้า</h4>
                    				@elseif($s->status==4)
										<h4 class="timeline-title">จัดส่งสินค้า</h4>
                    				@elseif($s->status==5)   
										<h4 class="timeline-title">ได้รับสินค้า</h4>
                    				@endif
										
									</div>
									<div class="timeline-body">
										<p>เมื่อวันที่ {{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</p>
									</div>
								</div>
							</li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>
							@endif
						@endforeach
					@endforeach
				@endif
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	  
	</body>

</html>