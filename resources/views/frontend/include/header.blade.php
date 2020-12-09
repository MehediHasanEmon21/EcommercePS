	
	@php
	$route = $route = Route::current()->getName();
	@endphp

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<div class="left-top-bar">
							<font size="3px" color="#fff">
		                        01928511049 &nbsp;&nbsp;&nbsp;
		                        asadullahkpi@gmail.com
		                    </font>
						</div>
					</div>

					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
	                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
	                    </ul>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ URL::to('public/assets/frontend/images/logo/logo.png') }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
	                        <li class="{{ ($route == 'home.page') ? 'active-menu' : '' }}">
	                            <a href="{{ url('/') }}">HOME</a>
	                        </li>
	                        <li class="{{ ($route == 'product.list') ? 'active-menu' : '' }}">
	                            <a href="#">SHOPS</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('product.list') }}">Products</a></li>
	                                <li><a href="shoping-cart.html">Checkout</a></li>
	                                <li><a href="">Cart</a></li>
	                            </ul>
	                        </li>
	                        <li class="{{ ($route == 'about.page') ? 'active-menu' : '' }}">
	                            <a href="{{route('about.page')}}">ABOUT US</a>
	                        </li>
	                        <li class="{{ ($route == 'contact.page') ? 'active-menu' : '' }}">
	                            <a href="{{route('contact.page')}}">CONTACT US</a>
	                        </li>
							@if(Auth::check() && @Auth::user()->userType == 'customer')
							<li class="active-menu">
	                            <a href="#">ACCOUNTS</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{route('customer.dashboard')}}">MY PROFILE</a></li>
	                                <li><a href="{{route('customer.password')}}">PASSWORD CHANGE</a></li>
	                                <li><a href="">MY ORDERS</a></li>
	                                <li>
	                                	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >LOGOUT</a>
	                                	  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									        @csrf
									      </form>
	                                </li>
	                            </ul>
	                        </li>
							@else
								<li><a href="{{ route('customer.login') }}">LOGIN</a></li>
							@endif
	                        
	                    </ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="public/assets/frontend/images/logo/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        01928511049 &nbsp;&nbsp;&nbsp;
	                        asadullahkpi@gmail.com
	                    </font>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
	                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
	                    </ul>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li class="{{ ($route == 'home.page') ? 'active-menu' : '' }}"><a href="{{url('/')}}">Home</a></li>
				<li class="{{ ($route == 'product.list') ? 'active-menu' : '' }}">
					<a href="#">SHOPS</a>
					<ul class="sub-menu-m">
						<li><a href="{{ route('product.list') }}">Products</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="shoping-cart.html">Cart</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<li class="{{ ($route == 'about.page') ? 'active-menu' : '' }}">
                    <a href="{{ route('about.page') }}">ABOUT US</a>
                </li>
                <li class="{{ ($route == 'contact.page') ? 'active-menu' : '' }}">
                    <a href="{{route('contact.page')}}">CONTACT US</a>
                </li>
                @if(Auth::check() && @Auth::user()->userType == 'customer')
                	<li class="active-menu">
                        <a href="#">ACCOUNTS</a>
                        <ul class="sub-menu">
         					<li><a href="{{route('customer.dashboard')}}">MY PROFILE</a></li>
	                         <li><a href="{{route('customer.password')}}">PASSWORD CHANGE</a></li>
                            <li><a href="">MY ORDERS</a></li>
                            <li>
                            	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >LOGOUT</a>
                            	  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							        @csrf
							      </form>
                            </li>
                        </ul>
                    </li>
                @else
                 <li><a href="{{ route('customer.login') }}">LOGIN</a></li>
                @endif
     
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="public/assets/frontend/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					@php
						$contents = Cart::content();
					@endphp
					@foreach($contents as $content)
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{URL::to($content->options->image)}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{$content->name}}
							</a>

							<span class="header-cart-item-info">
								{{$content->qty}} x tk {{$content->price}}
							</span>
						</div>
					</li>
					@endforeach
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: {{Cart::subtotal()}} tk
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{route('cart.products')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>