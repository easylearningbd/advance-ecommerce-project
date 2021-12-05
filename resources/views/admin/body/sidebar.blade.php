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
                        <img style="height: 60px" src="{{ asset('assets/backend/images/logo/green-shop-.png') }}" alt="">
                        <h3 style="margin-top: 17px;"><b>reen</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>{{ __("admin.Dashboard") }}</span>
                </a>
            </li>

            @php
                $brand = (auth()->guard('admin')->user()->brand == 1);
                $category = (auth()->guard('admin')->user()->category == 1);
                $product = (auth()->guard('admin')->user()->product == 1);
                $slider = (auth()->guard('admin')->user()->slider == 1);
                $coupons = (auth()->guard('admin')->user()->coupons == 1);
                $shipping = (auth()->guard('admin')->user()->shipping == 1);
                $blog = (auth()->guard('admin')->user()->blog == 1);
                $setting = (auth()->guard('admin')->user()->setting == 1);
                $returnOrder = (auth()->guard('admin')->user()->returnorder == 1);
                $review = (auth()->guard('admin')->user()->review == 1);
                $orders = (auth()->guard('admin')->user()->orders == 1);
                $stock = (auth()->guard('admin')->user()->stock == 1);
                $reports = (auth()->guard('admin')->user()->reports == 1);
                $allUsers = (auth()->guard('admin')->user()->alluser == 1);
                $adminUserRole = (auth()->guard('admin')->user()->adminuserole == 1);

            @endphp


            @if($brand == true)
                <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>{{ __("admin.Brands") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all.brand')? 'active':'' }}">
                            <a href="{{ route('all.brand') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All Brand") }}
                            </a>
                        </li>

                    </ul>
                </li>
            @else
            @endif

            @if($category == true)
                <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="mail">
                        </i>
                        <span>{{ __("admin.Category") }} </span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right">
              </i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all.category')? 'active':'' }}">
                            <a href="{{ route('all.category') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All Category") }}
                            </a></li>
                        <li class="{{ ($route == 'all.subcategory')? 'active':'' }}">
                            <a href="{{ route('all.subcategory') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All SubCategory") }}
                            </a>
                        </li>
                        <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}">
                            <a href="{{ route('all.subsubcategory') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All Sub->SubCategory") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($product == true)
                <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Products") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right">
              </i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'add-product')? 'active':'' }}">
                            <a href="{{ route('add-product') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Add Product") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'manage-product')? 'active':'' }}">
                            <a href="{{ route('manage-product') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Manage Products") }}
                            </a>
                        </li>
                    </ul>
                </li>

            @else
            @endif
            @if($slider == true)

                <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Slider") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right">
              </i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'manage-slider')? 'active':'' }}">
                            <a href="{{ route('manage-slider') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Manage Slider") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if($coupons == true)

                <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Coupons") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'manage-coupon')? 'active':'' }}">
                            <a href="{{ route('manage-coupon') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Manage Coupon") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($shipping == true)
                <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Shipping Area") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'manage-division')? 'active':'' }}">
                            <a href="{{ route('manage-division') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Ship Division") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'manage-district')? 'active':'' }}">
                            <a href="{{ route('manage-district') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Ship District") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'manage-state')? 'active':'' }}">
                            <a href="{{ route('manage-state') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Ship State") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if($blog == true)
                <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Manage Blog") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'blog.category')? 'active':'' }}">
                            <a href="{{ route('blog.category') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Blog Category") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'list.post')? 'active':'' }}">
                            <a href="{{ route('list.post') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.List Blog Post") }}
                            </a>
                        </li>
                        <li class="{{ ($route == 'add.post')? 'active':'' }}">
                            <a href="{{ route('add.post') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Add Blog Post") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($setting == true)

                <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file">
                        </i>
                        <span>{{ __("admin.Manage Setting") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right">
              </i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'site.setting')? 'active':'' }}">
                            <a href="{{ route('site.setting') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Site Setting") }}
                            </a>
                        </li>
                        <li class="{{ ($route == 'seo.setting')? 'active':'' }}">
                            <a href="{{ route('seo.setting') }}"><i
                                    class="ti-more">
                                </i>
                                {{ __("admin.Seo Setting") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($returnOrder == true)

                <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file">
                        </i>
                        <span>{{ __("admin.Return Order") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right">

              </i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'return.request')? 'active':'' }}">
                            <a href="{{ route('return.request') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Return Request") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'all.request')? 'active':'' }}">
                            <a href="{{ route('all.request') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All Request") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($review == true)

                <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Manage Review") }}</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'pending.review')? 'active':'' }}">
                            <a
                                href="{{ route('pending.review') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Pending Review") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'publish.review')? 'active':'' }}">
                            <a
                                href="{{ route('publish.review') }}">
                                <i class="ti-more">

                                </i>
                                {{ __("admin.Publish Review") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            <li class="header nav-small-cap">{{ __("admin.User Interface") }}</li>

            @if($orders == true)
                <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Orders") }} </span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'pending-orders')? 'active':'' }}">
                            <a
                                href="{{ route('pending-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Pending Orders") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}">
                            <a
                                href="{{ route('confirmed-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Confirmed Orders") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'processing-orders')? 'active':'' }}">
                            <a
                                href="{{ route('processing-orders') }}">
                                <i class="ti-more"></i>
                                {{ __("admin.Processing Orders") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'picked-orders')? 'active':'' }}">
                            <a
                                href="{{ route('picked-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Picked Orders") }}
                            </a></li>

                        <li class="{{ ($route == 'shipped-orders')? 'active':'' }}">
                            <a href="{{ route('shipped-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Shipped Orders") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'delivered-orders')? 'active':'' }}">
                            <a href="{{ route('delivered-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Delivered Orders") }}
                            </a>
                        </li>

                        <li class="{{ ($route == 'cancel-orders')? 'active':'' }}">
                            <a href="{{ route('cancel-orders') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Cancel Orders") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($stock == true)

                <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Manage Stock") }}
                        </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right">
                          </i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'product.stock')? 'active':'' }}">
                            <a href="{{ route('product.stock') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.Product Stock") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($reports == true)

                <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.All Reports") }}</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right">
                          </i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all-reports')? 'active':'' }}">
                            <a href="{{ route('all-reports') }}">
                                <i
                                    class="ti-more">
                                </i>
                                {{ __("admin.All Reports") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($allUsers == true)

                <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.All Users") }}</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all-users')? 'active':'' }}">
                            <a href="{{ route('all-users') }}">
                                <i
                                    class="ti-more">
                                </i>
                                {{ __("admin.All Users") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

            @if($adminUserRole == true)
                <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>{{ __("admin.Admin User Role") }}</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($route == 'all.admin.user')? 'active':'' }}">
                            <a
                                href="{{ route('all.admin.user') }}">
                                <i class="ti-more">
                                </i>
                                {{ __("admin.All Admin User") }}
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529">
            <i class="ti-settings">

            </i>
        </a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email">
            <i
                class="ti-email">

            </i>
        </a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout">
            <i
                class="ti-lock">
            </i>
        </a>
    </div>
</aside>
