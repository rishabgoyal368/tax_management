<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="row">
                        <div class="col-12">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-12 mr-auto text-left">

                                            {{ @Breadcrumbs::render(Request::segment(1)) }}
                                            <h4 class="text-dark">Admin Dashboard</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                        <div class="user-info card-body">
                            <div class="user-avatar mb-4">
                                <img src="{{env('APP_URL').'uploads/'.Auth::user()->profile_pic}}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                            </div>
                            <div class="user-details">
                                <h4><b>Welcome Admin</b></h4>
                                <p>{{date('Y-m-d')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                        <div class="card ctm-border-radius shadow-sm border-none grow">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <!-- <div class="col-6 align-items-center text-center">
                                        <a href="{{url('/')}}" class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div> -->
                                    @php
                                    $u = Request::segment(1);
                                    $url = explode('-',$u);

                                    $admin = Auth::guard('admin')->user();
                                    $name = $admin->role == 1 ? 'Officer' : 'Manager';
                                    @endphp
                                    <div class="col-6 align-items-center shadow-none text-center @if(last($url) == null) menu_active @endif">
                                        <a href="{{url('/')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div>

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == 'Manager')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'admin') menu_active @endif">
                                        <a href="{{url('/manage-admin')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage {{$name}}</span></a>
                                    </div>
                                    @endif
                                    <!-- <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'list') menu_active @endif">
                                        <a href="{{url('/task-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage task</span></a>
                                    </div> -->

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == 'Manager')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'tax') menu_active @endif">
                                        <a href="{{url('/manage-tax')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage Taxes</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'user') menu_active @endif">
                                        <a href="{{url('/manage-user')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage Users</span></a>
                                    </div>
                                    @endif
                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '2')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'supplier_data') menu_active @endif">
                                        <a href="{{url('/supplier-data')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Supplier Data (additional tax)</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '3')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'buy_invoice') menu_active @endif">
                                        <a href="{{url('/buy-invoice')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Buy Invoice (additional tax)</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '4')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'First_d') menu_active @endif">
                                        <a href="{{url('/first-dummy')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">social insurance (Company)</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '4')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'second_d') menu_active @endif">
                                        <a href="{{url('/second-dummy')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">social insurance (Employee)</span></a>
                                    </div>
                                    @endif
                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '5')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'third_d') menu_active @endif">
                                        <a href="{{url('/third-dummy')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Official document</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '6')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'forth_d') menu_active @endif">
                                        <a href="{{url('/forth-dummy')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">company establistment</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' || Auth::guard('admin')->user()->job == '7')
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'invoice-list') menu_active @endif">
                                        <a href="{{url('/invoice-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Income Tax</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'forth_d') menu_active @endif">
                                        <a href="{{url('/content')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Content</span></a>
                                    </div>
                                    @endif
<!-- ==============================================//new================================================== -->
                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'salary_tax') menu_active @endif">
                                        <a href="{{url('/salary-tax-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Salary Tax</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'company-establisment-list') menu_active @endif">
                                        <a href="{{url('/company-establisment-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Company Estalishment</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'add-deduct-tax-list') menu_active @endif">
                                        <a href="{{url('/add-deduct-tax-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Add Deduct Tax</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'salary2-tax-list') menu_active @endif">
                                        <a href="{{url('/salary2-tax-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Salary 2 Tax</span></a>
                                    </div>
                                    @endif

                                    @if(Auth::guard('admin')->user()->role == 'admin' )
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'financial-list') menu_active @endif">
                                        <a href="{{url('/financial-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Financial List</span></a>
                                    </div>
                                    @endif
<!-- ==============================================//new================================================== -->


                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>