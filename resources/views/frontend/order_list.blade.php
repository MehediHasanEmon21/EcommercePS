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
</style>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/assets/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Order
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

						<table class="table table-bordered table-striped">
							
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
										<a class="btn btn-success btn-sm" href="{{ route('customer.order.detail',$order->id) }}"><i class="fa fa-eye"></i></a>
										<a class="btn btn-primary btn-sm" target="_blank" href="{{ route('customer.order.print',$order->id) }}"><i class="fa fa-print"></i></a>
									</td>
									
								</tr>
							
								@endforeach
							</tbody>

						</table>
			
						
					</div>
		
				</div>
			</div>
		</div>
		



@endsection