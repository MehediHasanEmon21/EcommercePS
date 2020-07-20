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
			Customer Profile Update
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
						<h3 class="txt-center" style="padding-bottom: 15px">Edit Profile</h3>
						<form id="myform" enctype="multipart/form-data" method="post" action="{{ route('customer.profile.update') }}">
							@csrf
						<div class="row">
								<div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="name">Name</label>
					                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" placeholder="Enter name">
					                </div>

					             </div>

					             <div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="email">Email</label>
					                    <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email" placeholder="Enter email">
					                </div>

					             </div>

					             <div class="col-md-4">
                
					                <div class="form-group">
					                    <label for="mobile">Mobile</label>
					                    <input type="text" class="form-control" value="{{ $user->mobile }}" name="mobile" id="mobile" placeholder="Enter mobile">
					                </div>

					             </div>

					              <div class="col-md-6">
                
					               <div class="form-group">
					                    <label for="password_confirmation">Gender</label>
					                    <select name="gender" class="form-control">
					                      <option value="Male" {{ ($user->gender == 'Male' ? 'selected': '')}}>Male</option>
					                      <option value="Female" {{ ($user->gender == 'Female' ? 'selected': '')}}>Female</option>
					                    </select>
					                </div>

					             </div>

					              <div class="col-md-6">
                
					                <div class="form-group">
					                    <label for="address">Address</label>
					                    <input type="text" class="form-control" value="{{ $user->address }}" name="address" id="mobile" placeholder="Enter address">
					                </div>

					             </div>


					              <div class="col-md-4">
					                
					                <div class="form-group">
					                    <label for="password_confirmation">Image</label>
					                    <input type="file" id="image" class="form-control" name="image">
					                </div>
					  

					              </div>

					              <div class="col-md-4">
					              	  <img id="show-image" src="{{ ($user->image) ? URL::to($user->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">
					              </div>

					              <div class="col-md-4" style="padding-top: 20px">
					              	<button type="submit" class="btn btn-primary">Update Profile</button>
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
      name: {
        required: true,
      },
      mobile: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      address: {
        required: true,
        minlength: 5
      },
      gender: {
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