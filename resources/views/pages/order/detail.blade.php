@extends('master')

@section('content')

<style type="text/css">
  table tr td {
    padding: 15px; 
  }
</style>

        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Order Detail</h2>
              <a href="{{route('order.approve.list')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">Order List</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table border="1" width="100%" class="text-center">

              <tr>
                <td width="30%">
                  <img src="{{ URL::to('public/assets/frontend/images/logo/logo.png') }}" alt="IMG-LOGO">
                </td>
                <td width="40%">
                  <h3>Furnish Furniture</h3>
                  <span><strong>Mobile : </strong>01565454348</span><br>
                  <span><strong>Email : </strong>fur@gmail.com</span><br>
                  <span><strong>Address : </strong>Dhaka, Bangladesh</span><
                </td>
                <td width="30%">
                  <h3> Order No#{{$order->order_no}}</h3>
                </td>
              </tr>

              <tr>
                <td>Billing Info : </td>
                <td colspan="2">
                  <span><strong>Name: </strong>{{ $order->shipping->name }}</span>&nbsp;&nbsp;&nbsp;
                  <span><strong>Email: </strong>{{ $order->shipping->email }}</span><br>
                  <span><strong>Mobile: </strong>{{ $order->shipping->mobile }}</span>&nbsp;&nbsp;&nbsp;
                  <span><strong>Address: </strong>{{ $order->shipping->address }}</span><br>
                  <span><strong>Payment: </strong>{{ $order->payment->payment_method }}</span>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <h3>Order Detail</h3>
                </td>
                
              </tr>

              <tr>
                <td width="40%">Product Image & Name</td>
                <td width="30%">Color & Size</td>
                <td>Quantity & Price</td>
              </tr>
              
              @foreach($order->order_details as $detail)
              <tr>
                <td>
                  <img src="{{ URL::to($detail->product->image) }}" style="width: 50px; height: 50px">
                  <span>{{ $detail->product->name }}</span>
                </td>
                <td>
                  {{ $detail->color->name }} & {{ $detail->size->name }}
                </td>
                <td>
                  {{ $detail->quantity }} x {{ $detail->product->price }} = {{ $detail->quantity *  $detail->product->price}}
                </td>
              </tr>
              @endforeach

              <tr>
                <td colspan="2" style="text-align: right;">Grand Total</td>
                <td>{{ $order->order_total }}</td>
              </tr>
              
            </table>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection