@php
    $name = 'name_'.app()->currentLocale();
@endphp

<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
				<div class="sticky">
					<aside class="app-sidebar sidebar-scroll">
						<div class="main-sidebar-header active">
							<a class="desktop-logo logo-light active" href="{{ route('admin.dashboard.index') }}">

                                @foreach (\App\Models\Setting::where('active',1)->limit(1)->get() as $logo)
                                <img src="{{ asset('uploads/settings/'.$logo->logo_header) }}" class="main-logo" alt="logo">
                                @endforeach
                            </a>

							<a class="desktop-logo logo-dark active" href="{{ route('admin.dashboard.index') }}">

                                @foreach (\App\Models\Setting::where('active',1)->limit(1)->get() as $logo)
                                <img src="{{ asset('uploads/settings/'.$logo->logo_footer) }}" class="main-logo" alt="logo">
                                @endforeach
                            </a>
							<a class="logo-icon mobile-logo icon-light active" href="{{ route('admin.dashboard.index') }}"><img src="{{ asset('adminassets/img/brand/favicon.png') }}" alt="logo"></a>
							<a class="logo-icon mobile-logo icon-dark active" href="{{ route('admin.dashboard.index') }}"><img src="{{ asset('adminassets/img/brand/favicon-white.png') }}" alt="logo"></a>
						</div>
						<div class="main-sidemenu">
							<div class="app-sidebar__user clearfix">
								<div class="dropdown user-pro-body">
									<div class="main-img-user avatar-xl">
										<img alt="user-img" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"><span class="avatar-status profile-status bg-green"></span>
									</div>
									<div class="user-info">
										<h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->$name }}</h4>
										<span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
									</div>
								</div>
							</div>
							<div class="slide-left disabled" id="slide-left">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                 width="24" height="24" viewBox="0 0 24 24">
                                 <path d="M13.293 6.293 7.586 12l5.707 5.707
                                  1.414-1.414L10.414 12l4.293-4.293z"/></svg>
                                </div>
							<ul class="side-menu">
								<li class="side-item side-item-category">{{ __('admin.Main') }}</li>
								<li class="slide">
									<a class="side-menu__item" href="{{ route('admin.dashboard.index') }}">
                                        <img width="30" style="margin-inline-end: 14px" src="https://img.icons8.com/nolan/64/home.png"/>

                                          <span class="side-menu__label">{{ __('admin.dashboard') }}</span></a>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/settings') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">

                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/settings--v1.png"/>
                                            <span class="side-menu__label">{{ __('admin.settings') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side11" class="active " data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side12" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side13" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show " id="side11">
														<ul class="sidemenu-list ">
															<li class="side-menu__label1 "><a href="javascript:void(0);" class="">Settings</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/settings/index') ? 'active' : '' }}" href=" {{ route('admin.settings.index') }}">{{ __('admin.all settings ') }} </a></li>
														</ul>
													</div>
													<div class="tab-pane tab-content-double" id="side12">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane tab-content-double" id="side13">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/slider') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/sorting-options.png"/>
                                         <span class="side-menu__label">{{ __('admin.slider') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side14" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side15" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side16" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side14">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);" class="{{ request()->is('admin/slider*')  ? 'active' : '' }}">Slider</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/slider/index') ? 'active' : '' }}" href="{{ route('admin.slider.index') }}">{{ __('admin.all slider') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane tab-content-double" id="side15">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane tab-content-double" id="side16">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/blogs') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style=" margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/blog.png"/>
                                        <span class="side-menu__label">{{ __('admin.blogs') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side17" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side18" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side19" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side17">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);">Blogs</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/blogs/index') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">{{ __('admin.all blogs') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane tab-content-double" id="side18">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane tab-content-double" id="side19">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/order') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style=" margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/purchase-order.png"/>

                                           <span class="side-menu__label">{{ __('admin.order') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side20" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side21" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side22" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side20">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);">Order</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/order/index') ? 'active' : '' }}" href="{{ route('admin.order.index') }}">{{ __('admin.all order') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane tab-content-double" id="side21">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane tab-content-double" id="side22">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/features') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/star.png"/>
                                        <span class="side-menu__label">{{ __("admin.Features") }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side23" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side24" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side25" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side23">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);">Features</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/features/index') ? 'active' : '' }}" href="{{ route('admin.features.index') }}">{{ __('admin.all features') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane  tab-content-double" id="side24">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane  tab-content-double" id="side25">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
                                <li class="slide {{ str_contains(url()->current(), 'admin/teams') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/user-group-man-woman.png"/>
                                        <span class="side-menu__label">{{ __('admin.teams') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">
										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side23" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side24" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side25" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side23">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);">teams</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/teams/index') ? 'active' : '' }}" href="{{ route('admin.teams.index') }}">{{ __('admin.all teams') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane  tab-content-double" id="side24">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane  tab-content-double" id="side25">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
                                <li class="slide {{ str_contains(url()->current(), 'admin/review') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/starburst-shape.png"/><span class="side-menu__label">{{ __('admin.review') }}</span><i class="angle fe fe-chevron-down"></i></a>
									<ul class="slide-menu">

										<li class="panel sidetab-menu">
											<div class="tab-menu-heading p-0 pb-2 border-0">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#side23" class="active" data-bs-toggle="tab"><i class="fe fe-airplay"></i><p>Home</p></a></li>
														<li><a href="#side24" data-bs-toggle="tab"><i class="fe fe-package"></i><p>Events</p></a></li>
														<li><a href="#side25" data-bs-toggle="tab"><i class="fe fe-move"></i><p>Activity</p></a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body p-0 border-0">
												<div class="tab-content">
													<div class="tab-pane tab-content-show active" id="side23">
														<ul class="sidemenu-list">
															<li class="side-menu__label1"><a href="javascript:void(0);">Review</a></li>
															<li><a class="slide-item {{ str_contains(url()->current(), 'admin/reviews/index') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">{{ __('admin.all reviews') }}</a></li>
														</ul>
													</div>
													<div class="tab-pane  tab-content-double" id="side24">
														<h5 class="mt-3 mb-4 tx-16">Events</h5>
														<div class="latest-timeline">
															<div class="timeline">
																<div class="mt-0 event-text">
																	<h6 class="mb-0"><a target="_blank" href="#" class="timeline-head">Employees Meeting</a></h6>
																	<small class="text-muted mb-2">20 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Anniversary Celebration</a></h6>
																	<small class="mb-2 text-muted">14 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  magna aliqua nisi ut. </p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Best Employee Announcement</a></h6>
																	<small class="mb-2 text-muted">13 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Weekend trip</a></h6>
																	<small class="mb-2 text-muted">11 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">New Project Started..</a></h6>
																	<small class="mb-2 text-muted">09 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
																</div>
																<div class="mb-0 event-text">
																	<h6 class="mb-0"><a href="#" class="timeline-head">Gradening working</a></h6>
																	<small class="mb-2 text-muted">02 Feb, 2019</small>
																	<p class="tx-13">sed do eiusmod tempor  aliqua nisi ut aliquip. </p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane  tab-content-double" id="side25">
														<h5 class="mt-3 mb-4 tx-16">Activity</h5>
														<div class="activity mt-3 p-0">
															<img src="{{ asset('adminassets/img/users/8.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/5.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/6.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/7.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/14.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b> AngularJS Template</b></p>
																	<small class="text-muted ">30 mins ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/3.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free HTML Template</b></p>
																	<small class="text-muted ">1 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/1.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD Template</b></p>
																	<small class="text-muted ">3 days ago</small>
																</div>
															</div>
															<img src="{{ asset('adminassets/img/users/11.jpg') }}" alt="" class="img-activity">
															<div class="time-activity">
																<div class="item-activity">
																	<p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI Template</b></p>
																	<small class="text-muted ">5 days ago</small>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
							</ul>
							<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
						</div>
					</aside>
				</div>
