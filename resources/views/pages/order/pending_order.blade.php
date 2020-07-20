@extends('master')

@section('content')


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
              <h2 class="card-title">Pending Order List</h2>
              <a href="{{route('order.approve.list')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Color</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Oder No</th>
                  <th>Payment Method</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($orders as $order)
                <tr>

                  <td># {{ $order->order_no }}</td>
                  <td>{{ $order->payment->payment_method }}</td>
                  <td>{{ $order->order_total }} tk</td>
                  <td>
                    @if($order->status == 1)
                    <span class="badge badge-success">Approved</span>
                    @else
                    <span class="badge badge-danger">Unapproved</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-success btn-sm" id="approve" href="{{ route('order.approve',$order->id) }}"><i class="fa fa-check"></i></a>
                  </td>
                  
                </tr>
              
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Oder No</th>
                  <th>Payment Method</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
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


    <script type="text/javascript">
      
      $(document).on('click','#approve',function(e){
        e.preventDefault()
        var link = $(this).attr('href')
          Swal.fire({
            title: 'Are you sure to approve this?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
          }).then((result) => {
            if (result.value) {
              window.location.href = link
              Swal.fire(
                'Approved!',
                'Customer order has been approved.',
                'success'
              )
            }
          })

      })

    </script>


@endsection