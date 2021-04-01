
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="https://startbootstrap.github.io/startbootstrap-modern-business/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://startbootstrap.github.io/startbootstrap-modern-business/css/modern-business.css" rel="stylesheet">

</head>



  <!-- Navigation -->
  <h7>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{url('home')}}">CAMERA</a>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="ค้นหา" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
      </form>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เช่าสินค้า
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            @if(count($category0)>0)
            @foreach($category0 as $cat0)                
                <a class="dropdown-item" href="{{ url('/category/show/'.$cat0->id)}}">{{ $cat0->name }}</a>
              @endforeach
            @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
            @endif
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ซื้อสินค้า
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            @if(count($category1)>0)
            @foreach($category1 as $cat1)                
                <a class="dropdown-item" href="{{ url('/category/show/'.$cat1->id)}}">{{ $cat1->name }}</a>
              @endforeach
            @else
            <tr colspan="3">
                <td align="center">ไม่มีข้อมูลที่ท่านต้องการในขณะนี้</td>
            </tr>
            @endif
            </div>
          </li>
          <li class="nav-item">
          @guest
            <a class="nav-link" href="{{ url('/login')}}">การจองบริการเช่า-ซื้อครบวงจร</a>
          @else
            <a class="nav-link" href="{{ url('/complete')}}">การจองบริการเช่า-ซื้อครบวงจร</a>
          @endguest
            
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="{{url('contact')}}">ติดต่อเรา</a>
          </li>-->
          
          @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a>
                    </li>
                @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/order/list')}}">รายการคำสั่งซื้อ</a>
                    @if(Auth::user()->role == 1 && Auth::user()->status == 1)
                      <a class="dropdown-item" href="{{url('dashboard/index')}}">การจัดการแอดมิน</a>
                    @elseif(Auth::user()->role == 2 && Auth::user()->status == 1)
                      <a class="dropdown-item" href="{{url('dashboard/index')}}">การจัดการร้านค้า</a>
                    
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        ออกจากระบบ
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        <ul class="nav-item">
          @guest
            <a class="cart-button" href="{{url('/login')}}">
          @else
            <a class="cart-button" href="{{url('/cart')}}">
          @endguest
            <h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart2" color="white" viewBox="0 0 20 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
          @guest
            <span class="item-number ">0</span>
          @else
          <?php $userID = Auth::user()->id; ?>
            @if(count($orders)>0)
              @foreach($orders as $order)
                  @if($order->userID==$userID && $order->paymentID==0)
                        @if($order->list>0)
                            <span class="item-number "> {{$order->list}}</span>
                        @elseif($order->list==0)
                            <span class="item-number ">0</span>
                        @endif
                  @endif
              @endforeach
            @else
            <span class="item-number ">0</span>
            @endif
          @endguest
            </h4>
            </a>
        </ul>
        
      
        </ul>
      </div>
    </div>
  </nav>
  </h7>
  

  

  <!-- Bootstrap core JavaScript -->
  <script src="https://startbootstrap.github.io/startbootstrap-modern-business/vendor/jquery/jquery.min.js"></script>
  <script src="https://startbootstrap.github.io/startbootstrap-modern-business/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
