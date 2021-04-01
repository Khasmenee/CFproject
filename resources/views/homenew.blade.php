@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<body>

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" >
        <img src="{{url($store[0]->slide_image1 ? "uploads/images/".$store[0]->slide_image1 : "http://placehold.it/1900x1080")}}" >
          <div class="carousel-caption d-none d-md-block">
            <h3></h3>
            <p></p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item">
        <img src="{{url($store[0]->slide_image2 ? "uploads/images/".$store[0]->slide_image2 : "http://placehold.it/1900x1080")}}" >
          <div class="carousel-caption d-none d-md-block">
            <h3></h3>
            <p></p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item">
        <img src="{{url($store[0]->slide_image3 ? "uploads/images/".$store[0]->slide_image3 : "http://placehold.it/1900x1080")}}" >
          <div class="carousel-caption d-none d-md-block">
            <h3></h3>
            <p></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
  @if(count($store)>0)
        @foreach($store as $st)
    <h1 class="my-4">{{ $st->topic_homepage }}</h1>

    <!-- Marketing Icons Section -->
    <!-- รู้จักเรา ร้านคาเมร่าเปิดให้บริการเช่า-ซื้อชุดอุปกรณ์บัณฑิตและการถ่ายภาพมาเป็นเวลานานกว่า 10 ปีแล้ว... -->
    <!-- ขั้นตอนการสั่งซื้อสินค้า 1.สมัครสมาชิกและเข้าสู่ระบบ 2.เลือกเช่า-ซื้อสินค้าที่ต้องการ 3.ชำระเงินตามช่องทางที่กำหนด 4.เลือกรูปแบบการรับสินค้าและรอรับสินค้า -->
    <!-- รายละเอียดและโปรโมชั่น พิเศษ ! สำหรับสถานศึกษาที่สั่งซื้อสินค้าครบ 100 ชิ้นรับส่วนลด สูงสุด 10% -->
    <div class="row">
    @if(count($topic_homepage)>0)
      @foreach($topic_homepage as $top)
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">{{ $top->topic }}</h4>
          <div class="card-body">
            <p class="card-text">{{ $top->detail }}</p>
          </div>
        </div>
      </div>
      @endforeach
    @else
        <tr colspan="3">
            <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
        </tr>
    @endif

    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <!-- โรงเรียนดาราวิทยา โรงเรียนดาราวิทยาได้ใช้บริการสั่งซื้อสินค้าครบวงจรได้รับส่วนลดถึง 10 % ขอขอบคุณที่ไว้วางใจเรา
        โรงเรียนมัสญิดตะลุบัน โรงเรียนมัสญิดตะลุบันได้ใช้บริการสั่งซื้อสินค้าครบวงจรได้รับส่วนลดถึง 10 % ขอขอบคุณที่ไว้วางใจเรา
        โรงเรียนอิสลามประชาสงเคราะห์ โรงเรียนอิสลามประชาสงเคราะห์ได้ใช้บริการสั่งซื้อสินค้าครบวงจรได้รับส่วนลดถึง 10 % ขอขอบคุณที่ไว้วางใจเรา
    -->
    <h2>{{ $st->topic_workings }}</h2>

    <div class="row">
    @if(count($workings)>0)
      @foreach($workings as $work)
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="{{ url('/works/show/'.$work->id)}}"><img class="card-img-top" src="{{ url($work->image ? "uploads/images/".$work->image : "http://placehold.it/700x400") }}" width="150"></a>
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ url('/works/show/'.$work->id)}}">{{ $work->academy }}</a>
            </h5>
            <p class="card-text">{{ $work->detail }}</p>
          </div>
        </div>
      </div>
      @endforeach
    @else
        <tr colspan="3">
            <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
        </tr>
    @endif
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
      
        <h2>{{ $st->store_name }}</h2>
        <p>{{ $st->detail }}</p>
        <p><strong>{{ $st->address }}</strong> </p>
        <p><strong>เบอร์โทร : {{ $st->telephone }}</strong></p>
        <p><strong>Line ID : {{ $st->line_id }}</strong></p>
        <p><strong>Facebook Page : {{ $st->facebook_page }}</strong></p>
        @endforeach
      @else
        <tr colspan="3">
            <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
        </tr>
      @endif
          
        </ul>
        
      </div>
      <div class="col-lg-6">
        <img src="{{ url($st->image ? "uploads/images/".$st->image : "http://placehold.it/700x450") }}" width="500" length="200">
      </div>
    </div>
    <!-- /.row <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">-->

    <br>

    <!-- Call to Action Section -->
    
        
     

  </div>
  <!-- /.container -->

  </body>

</html>