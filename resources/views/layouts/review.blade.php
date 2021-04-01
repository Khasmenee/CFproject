@extends('layouts.app')
@inject('ThaiDateHelper', 'App\Services\ThaiDateHelperService')
<!doctype html>
<html lang="en">
    
  <body class="bg-light">
  <div class="col-sm-9 col-sm-offset-3 col-lg-12 col-lg-offset-2 main">
    <div class="row">
        <div class="col-md-10">
        <br><br>
            <h3><span class="item-number ">หมายเลขคำสั่งซื้อ : {{$orders[0]->id}}</span></h3>
        </div>
    </div>
    <br>
    <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
          <table class="table">
        <tr>
            <td align="center">รหัสสินค้า</td>
            <td align="center">ภาพ</td>
            <td align="center">ชื่อสินค้า</td>
            <td align="center">ประเภท</td>
            <td align="center">ราคาต่อหน่วย (บาท)</td>
            <td align="center">จำนวน</td>
            <td align="center">รวมราคา</td>
            <td align="center"></td>
        </tr>
                    @foreach($orderdetails as $orderdetail)
                        @foreach($products as $product)
                            @if($product->id==$orderdetail->productID && $orders[0]->id==$orderdetail->orderID && $orders[0]->userID==$userID )
                            
        <tr>
            <td align="center">{{$product->id}}</td>
            <td align="center"><img class="img-responsive" src="{{ url($product->image ? "uploads/images/".$product->image : "images/nophoto.jpg") }}" width="150"></td>
            <td align="center">{{$product->name}}</td>
            <td align="center">{{ $product->cat_id === 1 ? "เช่า" : "ซื้อ" }}</td>
            <td align="center">{{number_format($product->price,2)}} x</td>
            <td align="center">{{$orderdetail->quantity}}</td>
            <td align="center">{{number_format($product->price*$orderdetail->quantity,2)}} บาท</td>           
                            
            <td align="center">
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">ความคิดเห็น</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            
                            <form action="{{ url('/review/store')}}" method="post">
                            
                                    {{csrf_field()}}
                                <div class="modal-body">
                                        @include('layouts.comment')
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="orderID" value="{{$orders[0]->id}}">
                                    <input type="hidden" name="productID" value="{{$product->id}}">
                                    
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary">ส่ง</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- Modal -->

             <!-- Buuton modal -->
             <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info" >แสดงความคิดเห็น</button>  
             
             </td>
                        @endif
                        @endforeach
                    @endforeach
            
        </tr>
    </table>

          </li>
        </ul>
            <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="{{ url('/order/list') }}">กลับ</a>
            </div>
        </div>
    </div>
  </body>
</html>
