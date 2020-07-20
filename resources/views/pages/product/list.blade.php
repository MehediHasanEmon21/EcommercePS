@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product v1</li>
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
              <h2 class="card-title">Product List</h2>
              <a href="{{route('product.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Product</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $key=>$product)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->category->name}}</td>
                  <td>{{$product->brand->name}}</td>
                  <td><img src="{{ URL::to($product->image) }}" width="50" height="50"></td>
                  <td>
                    <a class="btn btn-sm btn-success" href="{{ route('product.details',$product->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                     
          
                    <a href="{{ route('product.delete',$product->id) }}" id="delete" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Image</th>
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