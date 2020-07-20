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
              <h2 class="card-title">Edit Product</h2>
              <a href="{{ route('product.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Product</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-4">
                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $product->name }}" class="form-control" name="name" placeholder="Enter name">
                        <font color="red">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                    </div>

              </div>

              <div class="col-md-4">
                
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category_id" class="form-control">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                          <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>

              </div>

              <div class="col-md-4">
                
                    <div class="form-group">
                        <label for="name">Brand</label>
                        <select name="brand_id" class="form-control">
                          <option value="">Select Brand</option>
                          @foreach($brands as $brand)
                          <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
                    </div>

              </div>

              <div class="col-md-6">
                
                    <div class="form-group">
                        <label for="name">Color</label>
                        <select name="color_id[]" class="form-control select2" multiple="">
                          @foreach($colors as $color)
                          <option {{ @in_array(['color_id' => $color->id ], $product_colors) ? 'selected' : '' }} value="{{ $color->id }}">{{ $color->name }}</option>
                          @endforeach
                        </select>
                        <font color="red">{{ ($errors->has('color_id')) ? ($errors->first('color_id')) : '' }}</font>
                    </div>

              </div>

                 <div class="col-md-6">
                
                    <div class="form-group">
                        <label for="name">Size</label>
                        <select name="size_id[]" class="form-control select2" multiple="">
                          @foreach($sizes as $size)
                          <option {{ @in_array(['size_id' => $size->id ], $product_sizes) ? 'selected' : '' }} value="{{ $size->id }}">{{ $size->name }}</option>
                          @endforeach
                        </select>
                        <font color="red">{{ ($errors->has('size_id')) ? ($errors->first('size_id')) : '' }}</font>

                    </div>

              </div>

              <div class="col-md-12">
                
                    <div class="form-group">
                        <label for="name">Short Description</label>
                        <textarea  name="short_desc" class="form-control">{{ $product->short_desc }}</textarea>
                    </div>

               </div>

                <div class="col-md-12">
                
                    <div class="form-group">
                        <label for="name">Long Description</label>
                        <textarea name="long_desc" class="form-control" rows="10">{{ $product->long_desc }}</textarea>
                    </div>

               </div>

               <div class="col-md-3">
                 <label for="name">Price</label>
                 <input type="number" name="price" value="{{ $product->price }}" class="form-control">
               </div>

                <div class="col-md-3">
                 <label for="name">Image</label>
                 <input type="file" name="image" id="image" class="form-control">
               </div>

               <div class="col-md-3">
                 <img id="show-image" src="{{ @($product->image) ? URL::to($product->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">
               </div>

               <div class="col-md-3">
                 <label for="name">Sub Image</label>
                 <input type="file" name="sub_image[]" class="form-control" multiple="">
               </div>




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
          </form>
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
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {
      name: {
        required: true,
      },
      category_id: {
        required: true,
      },
      brand_id: {
        required: true,
      },
      long_desc: {
        required: true,
      },
      price: {
        required: true,
      },
      image: {
        required: true,
      },
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


    </script>

@endsection