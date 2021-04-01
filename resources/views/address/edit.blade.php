@extends('layouts.app')
<!DOCTYPE html>
<html>
<body class="bg-light">
<br><br><br>
<div class="container">
<h4 class="mb-3">ที่อยู่การจัดส่ง</h4>
      @if(count($users)>0)
        @foreach($users as $user)
          @if($user->id==$userID)
        <form action="{{ url('/Address/update/'.$user->id) }}" method="post">
        {{ csrf_field() }}
          <div class="row g-3">
            <div class="col-sm-4">
              <label for="firstName" class="form-label">ชื่อ-สกุล</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            
            <div class="col-sm-4">
              <label for="email" class="form-label">อีเมล</label>
              <input type="email" class="form-control" name="email"  value="{{ $user->email }}">
            </div>

            <div class="col-sm-4">
              <label for="academy" class="form-label">สถาบัน</label>
              <input type="text" class="form-control" name="academy"  value="{{ $user->academy }}">
            </div>

            <div class="col-sm-8">
              <label for="address" class="form-label">ที่อยู่</label>
              <input type="text" class="form-control" name="address" value="{{ $user->address }}">
            </div>
            <div class="col-sm-4">
              <label for="telephone" class="form-label">เบอร์โทร</label>
              <input type="text" class="form-control" name="telephone"  value="{{ $user->telephone }}">
            </div>
            <div class="col-sm-4">
            <br>
              <button type="submit" class="btn btn-success">แก้ไข</button>
                <a href="{{ url('/cash') }}" class="btn btn-danger">ยกเลิก</a>
            </div>
          </div>
            </form>
                @endif
              @endforeach
            @endif
            </div>
          </div>
          
         
		
          </body>
</html>