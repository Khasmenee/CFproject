@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">


<body>

  <!-- Navigation -->
  

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-2">


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <img class="d-block img-fluid" src="{{ url($workings[0]->image ? "uploads/images/".$workings[0]->image : "http://placehold.it/700x400") }}" width="900" length="350">
        </div>

        <div class="row">

        

        
        
        </div>
        <!-- /.row -->
        
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</body>

</html>


