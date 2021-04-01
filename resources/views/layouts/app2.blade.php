
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
        
          
          @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a>
                    </li>
                @endif
          @endguest
            
        
      
        </ul>
      </div>
    </div>
  </nav>
  </h7>
  

  

  <!-- Bootstrap core JavaScript -->
  <script src="https://startbootstrap.github.io/startbootstrap-modern-business/vendor/jquery/jquery.min.js"></script>
  <script src="https://startbootstrap.github.io/startbootstrap-modern-business/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
