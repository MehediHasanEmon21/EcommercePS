@extends('frontend.master')

@section('title', 'Customer Login')

@section('content')

<style type="text/css">
#login .container #login-row #login-column #login-box {
  margin-top: 40px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  margin-bottom: 40px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/assets/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Verify Email
		</h2>
	</section>
		
	    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('verify.check') }}" method="post">
                          @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" value="{{ $user->email }}" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="code" class="text-info">Code:</label><br>
                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <i class="fa fa-user"> Never have account ? <a href="{{route('customer.signup') }}">Click Here</a></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
      

  $(document).ready(function () {

  $('#login-form').validate({
    rules: {
      code: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },

    },
    messages: {
      code: {
        required: "Code is required",
      },
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
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