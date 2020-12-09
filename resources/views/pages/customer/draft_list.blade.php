@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Draft Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
              <h2 class="card-title">Draft Customer List</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Sign Up</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($customers as $key=>$customer)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$customer->name}}
                  </td>
                  <td>{{$customer->email}}</td>
                  <td> {{$customer->mobile}}</td>
                  @php
                    $created = new Carbon\Carbon($customer->created_at);
                    $now = Carbon\Carbon::now();
                    $difference = $created->diff($now)->days < 1 ? 'today' : $created->diffForHumans($now);
                  @endphp
                  <td> {{$difference}}</td>
                  <td>
                    <a href="{{ route('customer.delete',$customer->id) }}" id="delete" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Sign Up</th>
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


@endsection