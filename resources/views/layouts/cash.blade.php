@extends('layouts.app')
<!doctype html>
<html lang="en">
    
  <body class="bg-light">
    
<div class="container">
  <main>
  @foreach($store as $store)
    <div class="py-5 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="100" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
    </svg>
      <h2>การชำระเงิน</h2>     
      <p class="lead">{{$store->payment_show}}</p>

    </div>
   
    <div class="row g-3">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <?php   $total = 0; ?>
          <span class="item-number">ตะกร้าสินค้า</span>
            @foreach($orders as $order)
                @if($order->userID==$userID)
                  @if($order->paymentID==0)
                  <span class="item-number ">[ {{$order->list}} ]</span>
                  @endif
                @endif
            @endforeach
        </h4>
        <ul class="list-group mb-3">
            @foreach($orders as $order)
              @if($order->paymentID==0)
                @foreach($orderdetails as $orderdetail)
                    @foreach($products as $product)
                        @if($product->id==$orderdetail->productID && $order->id==$orderdetail->orderID && $order->userID==$userID )
                        
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">{{$product->name}}</h6>
              <small class="text-muted">{{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }} จำนวน {{$orderdetail->quantity}}</small>
            </div>
            <?php  $total = $total+($product->price*$orderdetail->quantity);  ?>
            <span class="text-muted">{{number_format($product->price*$orderdetail->quantity)}} บาท</span>
          </li>
                      @endif
                    @endforeach
                @endforeach
              @endif
            @endforeach
            <?php $total_t=$total;?>
          
            <!-- ................ Start Form Promotion Code ............. -->
      <form action="{{ url('/promotion/code')}}" method = "POST" enctype="multipart/form-data"> 
      {{csrf_field()}}

        
        @if(Session::has('alert_no_code'))
        <?php $code_id=0;?>
        <li class="list-group-item d-flex justify-content-between">
            <span>รวม (บาท)</span>
            <strong>{{number_format($total)}} บาท</strong>
          </li>
        <br>
        <div class="alert alert-danger">
        {{ session('alert_no_code')}}
        </div>
        @elseif(Session::has('alert_cant_code'))
        <?php $code_id=0;?>
        <li class="list-group-item d-flex justify-content-between">
            <span>รวม (บาท)</span>
            <strong>{{number_format($total)}} บาท</strong>
          </li>
        <br>
        <div class="alert alert-danger">
        {{ session('alert_cant_code')}}
        </div>
        @elseif(Session::has('alert_can_code'))

        <br>
        <div class="alert alert-info">
        {{ session('alert_can_code')}}
        </div>
          @foreach($promotion as $promo)
            <?php $code_id=$promo->id; ?>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">โค๊ดโปรโมชั่น</h6>
              
                <small>{{$promo->code}}</small>
                
              
              </div>
             
              <span class="text-success">{{number_format(-($total*$promo->discount)/100)}}บาท</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
            <span>รวม (บาท)</span>
            <?php $total = $total-($total*$promo->discount)/100?>
            <strong>{{number_format($total)}} บาท</strong>
          </li>
         
          @endforeach
        @else
          <?php $code_id=0;?>
          <li class="list-group-item d-flex justify-content-between">
            <span>รวม (บาท)</span>
            <strong>{{number_format($total)}} บาท</strong>
          </li>
        @endif
        </ul>

          <div class="input-group">
            <input type="hidden" name="total" value="{{$total}}">
            <input type="text" class="form-control" placeholder="โค้ดโปรโมชั่น" name="code">
            <button type="submit" class="btn btn-secondary">แลกส่วนลด</button>
          </div>
    </form> <!-- .................. End Form Promotion Code................................ -->

    <form action="{{ url('/CashToStatus')}}" method = "POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <input type="hidden" name="code_id" value="{{$code_id}}">

        <br>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-3">ยอดที่ต้องชำระ</h4>
        </h4>
        @foreach($orders as $order)
              @if($order->paymentID==0 && $order->userID==$userID )
        <input type="hidden" name="orderID" value="{{$order->id}}">
              @endif
        @endforeach
        <input type="hidden" name="total" value="{{$total_t}}">
        <input type="hidden" name="paid" value="{{$total}}">

        @if($total<=5000)
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <span>จำนวนเงิน</span>
                <strong>{{number_format($total)}} บาท</strong>
                
            </li>  
        </ul>
        @else
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <span>ยอดมัดจำ 25 % </span>
                <strong>{{number_format(($total*25)/100)}} บาท</strong>
                
            </li>  
            <li class="list-group-item d-flex justify-content-between">
                <span>ยอดค้างชำระ</span>
                <strong>{{number_format($total-(($total*25)/100))}} บาท</strong>
            </li>  
        </ul>
        @endif
        <br><br><br><br><br><br><br><br><br><br><br>
        <label for="d" class="form-label">วันที่รับสินค้า</label>
        <input type="text" class="form-control" name="d" placeholder="{{$order->date}}" required>
      </div>

      <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">ที่อยู่การจัดส่ง</h4>
      @if(count($users)>0)
                @foreach($users as $user)
                    @if($user->id==$userID)
      <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">ชื่อ-สกุล</h6>
            </div>
            <span class="text-muted">{{$user->name}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">อีเมล</h6>
            </div>
            <span class="text-muted">{{$user->email}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">สถาบัน</h6>
            </div>
            <span class="text-muted">{{$user->academy}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">ที่อยู่</h6>
            </div>
            <span class="text-muted">{{$user->address}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">เบอร์โทร</h6>
            </div>
            <span class="text-muted">{{$user->telephone}}</span>
          </li>
        </ul>
                  @endif
                @endforeach
        @endif

    <a href="{{ url('/Address/edit') }}" class="btn btn-success"> แก้ไข </a>
    <br>

        

        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-3">{{ $store->payment_topic }}</h4>
        
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <span>{{$store->payment_detail}}</span>
            </li>    
        </ul>
    

          <h4 class="mb-3">รูปแบบการชำระเงิน</h4>
            
          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">โอนเงินผ่านบัญชีธนาคาร</label>
            </div>
            <br>
            <img src="{{ url($store->bank_image ? "uploads/images/".$store->bank_image : "http://placehold.it/400x150") }}" width="400">
          </div>

          <div class="row gy-3">
          <div class="col-md-4">
              <label for="cc-number" class="form-label">ชื่อ-สกุล ผู้โอน</label>
              <input type="text" class="form-control" id="cc-number" name="name" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
            <div class="col-md-3">
              <label for="cc-name" class="form-label">วันที่โอน</label>
              <input type="text" class="form-control" id="cc-name" name="date" placeholder="00/00/0000" required>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-2">
              <label for="cc-number" class="form-label">เวลาโอน</label>
              <input type="text" class="form-control" id="cc-number" name="time" placeholder="00:00:00" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
            <div class="col-md-3">
              <label for="cc-number" class="form-label">จำนวนเงินที่โอน</label>
              <input type="text" class="form-control" id="cc-number" name="amount" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">หลักฐานการโอนเงิน</label>
              <input type="file" name="image" class="form-control" size="4">
            </div>
            

          </div>
          
          <br>
          <button class="w-25 btn btn-primary btn-lg" type="submit">ยืนยัน</button>                    
          <a class="w-25 btn btn-danger btn-lg" href="{{ url('/cart') }}">ยกเลิก</a>
        
    </div>
    </form>
    @endforeach
  </main>

  <br><br><br>
</div>


    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
