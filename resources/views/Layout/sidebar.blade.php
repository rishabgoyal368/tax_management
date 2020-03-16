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
                                <img src="{{asset('assets/img/profiles/img-13.jpg')}}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
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
                                    <div class="col-6 align-items-center text-center">
                                        <a href="index.html" class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{url('/Job-listing-websites')}}" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Job Listing Websites</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{url('/designation')}}" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class="">Designation</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="calendar.html" class="text-dark p-4 ctm-border-right"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="leave.html" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="reviews.html" class="text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="reports.html" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="manage.html" class="text-dark p-4 ctm-border-right"><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manage</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="settings.html" class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="employment.html" class="text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>