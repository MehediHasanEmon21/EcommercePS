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
              <h2 class="card-title">Product Details</h2>
              <a href="{{route('product.view')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Product</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table  class="table table-bordered table-striped">
              
                <tr>
                  <td width="50%"><strong>Product</strong></td>
                  <td width="50%">{{ $product->name }}</td>
                </tr>
                <tr>
                  <td width="50%"><strong>Brand</strong></td>
                  <td width="50%">{{ $product->brand->name }}</td>
                </tr>
                <tr>
                  <td width="50%"><strong>Category</strong></td>
                  <td width="50%">{{ $product->category->name }}</td>
                </tr>
                <tr>
                  <td width="50%"><strong>Color</strong></td>
                  <td width="50%">
                    @foreach($product_colors as $product_color)
                        {{ $product_color->color->name }}
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                  </td>
                </tr>

                <tr>
                  <td width="50%"><strong>Size</strong></td>
                  <td width="50%">
                    @foreach($product_sizes as $product_size)
                        {{ $product_size->size->name }}
                        @if(!$loop->last)
                        ,
                        @endif

                    @endforeach
                  </td>
                </tr>

                <tr>
                  <td width="50%"><strong>Short Description</strong></td>
                  <td width="50%">{{ $product->short_desc }}</td>
                </tr>

                <tr>
                  <td width="50%"><strong>Image</strong></td>
                  <td width="50%">

                        <img src="{{ URL::to($product->image) }}" width="50" height="50">

                  </td>
                </tr>

                <tr>
                  <td width="50%"><strong>Sub Image</strong></td>
                  <td width="50%">
                    @foreach($product_images as $product_image)
                        <img src="{{ URL::to($product_image->sub_image) }}" width="50" height="50">
                    @endforeach
                  </td>
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