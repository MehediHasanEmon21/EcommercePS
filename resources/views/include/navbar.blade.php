
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   
          @if(Auth::user()->userType == 'Admin')
          <li class="nav-item has-treeview {{ $prefix == '/user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{ $route == 'user.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{ $prefix == '/profile' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link {{ $route == 'profile.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>



       

          <li class="nav-item has-treeview {{ $prefix == '/category' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.view')}}" class="nav-link {{ $route == 'category.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>

              <li class="nav-item has-treeview {{ $prefix == '/brand' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Brand
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brand.view')}}" class="nav-link {{ $route == 'brand.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p>
                </a>
              </li>
            </ul>
          </li>


               <li class="nav-item has-treeview {{ $prefix == '/color' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Color
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('color.view')}}" class="nav-link {{ $route == 'color.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
          </li>

               <li class="nav-item has-treeview {{ $prefix == '/size' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Size
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('size.view')}}" class="nav-link {{ $route == 'size.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/product' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.view')}}" class="nav-link {{ $route == 'product.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item has-treeview {{ $prefix == '/order' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.pending.list')}}" class="nav-link {{ $route == 'order.pending.list' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Order</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.approve.list')}}" class="nav-link {{ $route == 'order.approve.list' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Order</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview {{ $prefix == '/customer' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.list')}}" class="nav-link {{ $route == 'customer.list' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.draft.list')}}" class="nav-link {{ $route == 'customer.draft.list' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Draft Customer</p>
                </a>
              </li>
            </ul>
          </li>









 
          
            </ul>
          </li></ul>
      </nav>