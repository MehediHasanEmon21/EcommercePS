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
			Customer Dashboard
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
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="card">
									<div class="img-circle txt-center" style="padding-top: 10px">
										<img style="width: 80px; height: 80px; border-radius: 50px" src="{{ (Auth::user()->image) ? URL::to(Auth::user()->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" alt="">
									</div>
									<div style="padding-bottom: 20px">
										<h3 class="txt-center">{{Auth::user()->name}}</h3>
										@if(@Auth::user()->address)
									    <p class="txt-center">{{Auth::user()->address}}</p>
									    @endif
									</div>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Mobile :</td>
												<td>{{Auth::user()->mobile}}</td>
											</tr>
											<tr>
												<td>Email :</td>
												<td>{{Auth::user()->email}}</td>
											</tr>
											@if(@Auth::user()->gender)
											<tr>
												<td>Gender :</td>
												<td>{{Auth::user()->gender}}</td>
											</tr>
											@endif
										</tbody>
									</table>
									<a href="{{ route('customer.edit.profile') }}" class="btn btn-primary btn-block">Edit Profile</a>
								</div>
							</div>
						</div>
						
					</div>
		
				</div>
			</div>
		</div>
		



@endsection