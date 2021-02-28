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
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'admin') menu_active @endif">
                                        <a href="{{url('/manage-admin')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage {{$name}}</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'user') menu_active @endif">
                                        <a href="{{url('/manage-user')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage Users</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'list') menu_active @endif">
                                        <a href="{{url('/task-list')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage task</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center  @if(last($url) == 'tax') menu_active @endif">
                                        <a href="{{url('/manage-tax')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Manage Taxes</span></a>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>