@extends('frontend.master')

@section('title', 'Cart Products')

@section('content')
<style type="text/css">
	.prof li {
		background: #1781BF;
		padding: 7px;
		margin: 3px;
		border-radius: 15px;
	}
	.prof li a {
		color: #fff;
		padding-left: 15px;
	}
	table tr td {
		padding: 15px; 
	}
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/assets/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Order Detail
		</h2>
	</section>
		<div class="bg0 p-t-75 p-b-85">
			<div class="container" style="padding: 15px 0 15px 0">
				<div class="row">

					<div class="col-md-2">

						<ul class="prof">
							<li><a href="{{ route('customer.dashboard') }}">My Profile</a></li>
							<li><a href="{{ route('customer.password') }}">Password Change</a></li>
							<li><a href="{{ route('customer.order.list') }}">My Orders</a></li>
						</ul>
						
					</div>

					<div class="col-md-10">

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
		
				</div>
			</div>
		</div>
		



@endsection