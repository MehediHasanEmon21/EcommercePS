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
			Customer Password Update
		</h2>
	</section>
		<div class="bg0 p-t-75 p-b-85">
			<div class="container" style="padding: 15px 0 15px 0">
				<div class="row">

					<div class="col-md-2">

						<ul class="prof">
							<li><a href="{{ route('customer.dashboard') }}">My Profile</a></li>
							<li><a href="{{ route('customer.password') }}">Password Change</a></li>
							<li><a href="">My Orders</a></li>
						</ul>
						
					</div>

					<div class="col-md-10">
						<h3 class="txt-center" style="padding-bottom: 15px">Edit Password</h3>
						<form id="myform" method="post" action="{{ route('customer.password.update') }}">
							@csrf
						<div class="row">
								<div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="current_password">Current Password</label>
					                    <input type="password" class="form-control"  name="current_password" id="current_password">
					                </div>

					             </div>

					             <div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="new_password">New Password</label>
					                    <input type="password" class="form-control" name="new_password" id="new_password">
					                </div>

					             </div>

					             <div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="password_confirmation">Confirm Password</label>
					                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
					                </div>

					             </div>

					   

					              <div class="col-md-4" style="padding-top: 20px">
					              	<button type="submit" class="btn btn-primary">Update Password</button>
					              </div>

						</div>
						</form>
						</div>
						
					</div>
		
				</div>
			</div>
		</div>
		

<script>

  $(document).ready(function () {


  $('#myform').validate({
    rules: {
      cuerrent_password: {
        required: true,
      },
      new_password: {
        required: true,
        minlength: 8
      },
      password_confirmation: {
        required: true,
        equalTo: '#new_password'
      },
    },
    messages: {
      cuerrent_password: {
        required: "Current Password is required",
      },
      new_password: {
        required: "Password is required",
        minlength: "Your password must be at least 8 characters long"
      },
      password_confirmation: {
        required: "Password confirmation is required",
        equalTo: "Password confirmation does not match"
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