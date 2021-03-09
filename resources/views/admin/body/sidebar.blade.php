@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
 
@endphp


  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
            
          </ul>
        </li> 
		  
        <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
          <a href="#">
            <i data-feather="mail"></i> <span>Category </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
         <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
<li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>


                      </ul>
        </li>
		
        <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add Products</a></li>

             <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Products</a></li>
             
          </ul>
        </li> 		  




         <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>

             
             
          </ul>
        </li>   



         <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>

             
             
          </ul>
        </li>      



         <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>

         <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>

         <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a></li>

             
             
          </ul>
        </li>         




		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
      <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>  
		  
        		  
		  
		 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>