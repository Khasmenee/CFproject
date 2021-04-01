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
            </div>
            <div class="col-md-3">
                <a class="btn btn-primary" href="{{ url('/dashboard/users/create') }}">เพิ่มผู้ใช้ใหม่</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr style="background-color:#f3f3f3">
                    <td align="center">ลำดับ</td>
                    <td align="center">ชื่อผู้ใช้</td>
                    <td align="center">Action</td>
                </tr>
            </thead>
            <tbody>
                @if(count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <td align="center">{{ $user->id }}<br>
                            [<a href="{{ url('/dashboard/users/'.$user->id.'/edit') }}">แก้ไข</a>]
                        </td>
                        <td align="center">
                            {{ $user->name }} <br>
                            @if($user->role == 1)
                                [ Administrator ]
                            @elseif($user->role==2)
                                [ Manager User ]
                            @else
                                [ General User ]
                            @endif
                            {{ $user->status == 1 ? '[ Active ]' : '[ Not Active]' }}
                        </td>
                        <td align="center" onclick="return confirm('ต้องการที่จะลบข้อมูลนี้หรือไม่ ?')">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy' , $user->id]]) !!}
                            {!! Form::submit('ลบ', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="4">ไม่มีข้อมูลผู้ใช้</td>
                    </tr>
                @endif
            </tbody>
        </table>
    
    

@if(Session::has('success_msg'))
<script type="text/javascript">
    swal({
        title: "Good job!",
        text: "{{ session('success_msg') }}",
        icon: "success",
    });
</script>
@endif
{{ $users->render() }}
</div></div></div></div>
  
		
</body>
</html>