@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">


<body>

  <!-- Navigation -->
  

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h2 class="my-4">เช่าสินค้า</h2>
        <div class="list-group">
        @if(count($category0)>0)
            @foreach($category0 as $cat0)
                <a href="{{ url('/category/show/'.$cat0->id)}}" class="list-group-item">{{ $cat0->name }}</a>
              @endforeach
        @endif
        </div>


        <h2 class="my-4">ซื้อสินค้า</h2>
        <div class="list-group">
        @if(count($category1)>0)
            @foreach($category1 as $cat1)
                <a href="{{ url('/category/show/'.$cat1->id)}}" class="list-group-item">{{ $cat1->name }}</a>
            @endforeach
        @endif
                
            
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        @if(count($caticons)>0)
            @foreach($caticons as $cat)
              @if($category[0]->caticon_id==$cat->id)
              <img class="d-block img-fluid" src="{{ url($cat->name ? "uploads/images/".$cat->name : "images/nophoto.jpg") }}" width="900" length="350">
              @endif
            @endforeach
        @endif
        </div>

        <div class="row">

        

        @if(count($products)>0)
            @foreach($products as $product)
              @if($category[0]->id== $product->cat_id)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#">
              <img class="card-img-top" src="{{ url($product->image ? "uploads/images/".$product->image : "http://placehold.it/700x400") }}" width="700" length="400">
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{url('/product/show/'.$product->id)}}">{{ $product->name }}</a>
                </h4>
                <h5>{{ $product->price }} บาท</h5>
                <p class="card-text">{{ $product->show }}</p>
              </div>
              <div class="card-footer">
              @if($product->star==1)
                <span class="text-warning">&#9733; &#9734; &#9734; &#9734; &#9734;</span>
              @elseif($product->star==2)
                <span class="text-warning">&#9733; &#9733; &#9734; &#9734; &#9734;</span>
              @elseif($product->star==3)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</span>
              @elseif($product->star==4)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              @elseif($product->star==5)
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
              @endif
              </div>
            </div>
          </div>
          @endif

          
          @endforeach
        @endif
        
        </div>
        <!-- /.row -->
        {{ $products->render()}}
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</body>

</html>


