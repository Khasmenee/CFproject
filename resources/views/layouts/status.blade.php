@extends('layouts.app')
@inject('ThaiDateHelper', 'App\Services\ThaiDateHelperService')
<!doctype html>
<html lang="en">
    
  <body class="bg-light">
    
<div class="container">
  <main>
 
    <div class="py-5 text-center">
    @foreach($orders as $order)
      <h2>สถานะหมายเลขคำสั่งซื้อ : {{$order->id}}</h2>
      
        @if($order->userID==$userID)
          @foreach($status as $s)
            @if($order->status == $s->id)
              @if($s->status==1)
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                </svg>
                <p class="lead">รอการยืนยัน</p>
              @elseif($s->status==2)
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <p class="lead">ยืนยันคำสั่งซื้อ</p>
              @elseif($s->status==3)
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                <path d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                <path d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                </svg>
              <p class="lead">ผลิตสินค้า</p>
              @elseif($s->status==4)
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <p class="lead">จัดส่งสินค้า</p>
              @elseif($s->status==5)
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                </svg>
                <p class="lead">ได้รับสินค้า</p>
              @elseif($s->status==-1)
              <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>
                <p class="lead">คำสั่งซื้อถูกปฏิเสธ</p>
                @foreach($reject as $re)
                  @if($order->id==$re->orderID)
                  <p class="lead">{{$re->title}}</p>
                  <p class="lead">{{$re->des}}</p>
                  @endif
                @endforeach 
              @endif
              <p class="lead">{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</p>
            @endif
          @endforeach 
    <br>
      <table class="table">
    <tr>
    <td>
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
        </svg>
    </td>
    <td>
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
    </td>
    <td>    
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
        <path d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
        <path d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
        </svg>
    </td>
    <td>
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>
    </td>
    <td>    
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="110" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
        </svg>
    </td>
    </tr>
    <tr>
        <td>รอการยืนยัน</td>
        <td>ยืนยันคำสั่งซื้อ</td>
        <td>ผลิตสินค้า</td>
        <td>จัดส่งสินค้า</td>
        <td>ได้รับสินค้า</td>
    </tr>
    <tr>
        <td>รอการตอบรับจากร้านค้า ดำเนินการภายใน 48 ชม.</td>
        <td>ร้านค้าตอบรับคำสั่งซื้อ</td>
        <td>กระบวนการผลิตสินค้าตามระยะเวลาที่กำหนด</td>
        <td>เริ่มต้นขนส่งสินค้าไปยังที่อยู่ปลายทาง</td>
        <td>ลูกค้ายืนยันการได้รับสินค้า</td>
    </tr>
    <tr>
      <?php $c=0; ?>
      @foreach($status as $s)
        @if($s->status==1 && $order->id == $s->orderID)
          <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td> 
          <?php $c++; ?>
        @endif
      @endforeach
      @if($c==0)
        <td>-</td>
      @endif
      <?php $c=0; ?>
      @foreach($status as $s)
        @if($s->status==2 && $order->id == $s->orderID)
          <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td> 
          <?php $c++; ?>
        @endif
      @endforeach
      @if($c==0)
        <td>-</td>
      @endif
      <?php $c=0; ?>
      @foreach($status as $s)
        @if($s->status==3 && $order->id == $s->orderID)
          <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td> 
          <?php $c++; ?>
        @endif
      @endforeach
      @if($c==0)
        <td>-</td>
      @endif
      <?php $c=0; ?>
      @foreach($status as $s)
        @if($s->status==4 && $order->id == $s->orderID)
          <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td> 
          <?php $c++; ?>
        @endif
      @endforeach
      @if($c==0)
        <td>-</td>
      @endif
      <?php $c=0; ?>
      @foreach($status as $s)
        @if($s->status==5 && $order->id == $s->orderID)
          <td>{{$ThaiDateHelper->simpleDateFormat($s->created_at)}}</td> 
          <?php $c++; ?>
        @endif
      @endforeach
      @if($c==0)
        <td>-</td>
      @endif
      
     
    </tr>
    </table>
    
            
        @endif
      @endforeach
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
