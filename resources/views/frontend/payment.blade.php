@extends('frontend.master')

@section('title', 'Cart Products')

@section('content')
<style type="text/css">
	.sss {
		float: left;
	}
	.s888 {
		height: 40px;
		border: 1px solid #e6e6e6;
	}
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/assets/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shopping Cart Details
		</h2>
	</section>
		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-stripe table-bordered">
							<tr class="table_head">
								<th>Image</th>
								<th>Name</th>
								<th>Color</th>
								<th>Size</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
							@php
							$total = 0;
							@endphp
							@foreach($contents as $content)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{$content->options->image}}" alt="IMG">
									</div>
								</td>
								<td>{{$content->name}}</td>
								<td>{{$content->options->color}}</td>
								<td>{{$content->options->size}}</td>
								<td>{{$content->price}} tk</td>
								<td>
										<form method="POST" action="{{ route('cart.update') }}">
										@csrf 
										<div>
											<input style="width: 100px; min-width: 100px;" class="mtext-104 cl3 txt-center num-product form-control sss" type="number" name="quantity" value="{{ $content->qty }}">
											<input type="hidden" name="rowId" value="{{ $content->rowId }}">
											<input type="submit" name="" value="update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 ">
										</div>
										</form>
								
								</td>
								<td>{{$content->subtotal}} tk</td>
								<td>
								<a href="{{ route('cart.delete',$content->rowId) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							@php
							$total += $content->subtotal;
							@endphp
							@endforeach
						</table>
					</div>
				</div>

					<div class="container">
                   		
                   		<div class="row">
                   			
                   			<div class="col-md-4">
                   				<h4>Select Payment Method(Bkash:01657657546)</h4>

                   			</div>

                   			<div class="col-md-8">
								<form id="myform" method="post" action="{{ route('order.store') }}">
									@csrf
                   				<div class="row">
									
									<input type="hidden" name="total" value="{{ $total }}">
                   					<div class="col-md-6 form-group">
										@if(Session::has('message'))
	                   					<div class="alert alert-danger alert-dismissible">
	                   						<button class="close" data-dismiss="alert" type="button">&times;</button>
	                   						<strong>{{ Session::get('message') }}</strong>
	                   					</div>
										@endif
                   						<select name="payment_method" id="payment_method" class="form-control">
		                   					<option value="">Select Method</option>
		                   					<option value="handcash">HandCash</option>
		                   					<option value="bkash">Bkash</option>
		                   				</select>
                   						
                   					</div>

                   					<div class="col-md-6" id="transaction_id" style="display: none">
                   						<input type="text"  name="transaction_id" class="form-control">
                   					</div>

                   					<div class="col-md-4">
                   						<button class="btn btn-success btn-sm">Submit</button>
                   					</div>



                   				</div>
                   				</form>

                   				

                   			</div>

                   		</div>

                    </div>

                    

			</div>
		</div>
	</div>

	<script type="text/javascript">
		

		$(document).on('click','#payment_method',function(){

			var val = $(this).val();

			if (val == 'bkash') {

				$('#transaction_id').show()

			}else{
				$('#transaction_id').hide()
			}

		})

	</script>

	<script>

	  $(document).ready(function () {


  $('#myform').validate({
    rules: {
      payment_method: {
        required: true,
      }, 
    },
    messages: {
      payment_method: {
        required: "Payment Method is required",
      },

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