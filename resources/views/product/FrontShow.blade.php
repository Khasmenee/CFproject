@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">


<body>

  <!-- Navigation -->
  

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
      @if(Session::has('alert_cart'))
      <br>
    <div class="alert alert-info">
        {{ session('alert_cart')}}
    </div>
    @endif
      <h2 class="my-4">เช่าสินค้า</h2>
        <div class="list-group">
       
            @foreach($category0 as $cat0)
                <a href="{{ url('/category/show/'.$cat0->id)}}" class="list-group-item">{{ $cat0->name }}</a>
              @endforeach
       
        </div>


        <h2 class="my-4">ซื้อสินค้า</h2>
        <div class="list-group">
        
            @foreach($category1 as $cat1)
                <a href="{{ url('/category/show/'.$cat1->id)}}" class="list-group-item">{{ $cat1->name }}</a>
            @endforeach
        
                
            
        </div>
        
      </div>
      <!-- /.col-lg-3 -->
      
            @foreach($products as $pro)
      <div class="col-lg-5">
        <div class="card mt-4">
        <img src="{{ url($pro->image ? "uploads/images/".$pro->image : "http://placehold.it/700x400") }}" width="450">
          </div>
      
          <div class="card card-outline-secondary my-4">
          <div class="card-header">
            โปรโมชั่น
          </div>
          <div class="card-body">
            @foreach($promotion as $promo)
            <p>{{$promo->detail}}</p>
            <small class="text-muted">สิ้นสุดโปรโมชั่น {{$promo->date}}</small>
            @endforeach
          </div>
          
        </div>
      </div>
        

        <div class="col-lg-4">
        <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">{{$pro->name}}</h3>
            <h4>{{$pro->price}} บาท</h4>
            <p class="card-text">{{$pro->show}}</p>
            <p class="card-text">{{$pro->detail}}</p>

            @guest
              <a href="{{ url('/login')}}" class="btn btn-success">หยิบใส่รถเข็น</a>
            @else
            <form action="{{ url('/SendToCart')}}" method = "POST">
              {{csrf_field()}}
              <input type="hidden" name="productID" value="{{$pro->id}}">
            <?php $userID = Auth::user()->id; ?>
              @if($orders>0)
                @foreach($orders as $order)
                  @if($order->userID==$userID)
                    @if($order->paymentID==0)
                      <input type="hidden" name="orderID" value="{{$order->id}}">
                    @endif
                  @endif
                  @if($order->paymentID==0)
                    @if($orderdetails>0)
                      @foreach($orderdetails as $orderdetail)
                        @if($orderdetail->productID==$pro->id && $order->id==$orderdetail->orderID)
                          <input type="hidden" name="orderdetailID" value="{{$orderdetail->id}}">
                        @endif
                      @endforeach
                    @endif
                  @endif
                @endforeach
              @else
                  <input type="hidden" name="orderID" value="0">
              @endif

                  
            
              <button type = "submit" class="btn btn-success">หยิบใส่รถเข็น</button>
            </form>
            @endguest
            @foreach($products as $pro)
              @if($pro->star==1)
                <span class="text-warning">&#9733; &#9734; &#9734; &#9734; &#9734;</span>1.0 ดาว
              @elseif($pro->star==2)
                <span class="text-warning">&#9733; &#9733; &#9734; &#9734; &#9734;</span>2.0 ดาว
              @elseif($pro->star==3)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span>3.0 ดาว
              @elseif($pro->star==4)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>4.0 ดาว
              @elseif($pro->star==5)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>5.0 ดาว
              @endif
            @endforeach
        </div></div>
        @endforeach

        
        
        
        <!-- /.card -->

        
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  
</body>

</html>
