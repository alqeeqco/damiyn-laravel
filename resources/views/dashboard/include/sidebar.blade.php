

<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
				<div class="sticky">
					<aside class="app-sidebar sidebar-scroll">
						<div class="main-sidebar-header active">
							<a class="desktop-logo logo-light active" href="{{ route('site.home') }}">

                                @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                <img src="{{ url('uploads/settings/'.$logo->logo_header) }}" class="main-logo" alt="logo">
                                @endforeach
                            </a>

							<a class="desktop-logo logo-dark active" href="{{ route('admin.dashboard.index') }}">

                                @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                <img src="{{ url('uploads/settings/'.$logo->logo_footer) }}" class="main-logo" alt="logo">
                                @endforeach
                            </a>
							<a class="logo-icon mobile-logo icon-light active" href="{{ route('admin.dashboard.index') }}">


                                @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                <img src="{{ url('uploads/settings/'.$logo->logo_header) }}" alt="logo">

                                @endforeach
                            </a>
							<a class="logo-icon mobile-logo icon-dark active" href="{{ route('admin.dashboard.index') }}">

                                @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                                <img src="{{ url('uploads/settings/'.$logo->logo_header) }}" alt="logo">
                                @endforeach
                            </a>
						</div>
						<div class="main-sidemenu">
							<div class="app-sidebar__user clearfix">
								<div class="dropdown user-pro-body">
									<div class="main-img-user avatar-xl">
										<img alt="user-img" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"><span class="avatar-status profile-status bg-green"></span>
									</div>
									<div class="user-info">
										<h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
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
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.settings.index') }}">

                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/settings--v1.png"/>
                                            <span class="side-menu__label">{{ __('admin.settings') }}</span></a>

								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/slider') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.slider.index') }}">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/sorting-options.png"/>
                                         <span class="side-menu__label">{{ __('admin.slider') }}</span></a>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/blogs') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.blogs.index') }}">
                                        <img width="30" style=" margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/blog.png"/>
                                        <span class="side-menu__label">{{ __('admin.blogs') }}</span></a>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/order') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.order.index') }}">
                                        <img width="30" style=" margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/purchase-order.png"/>

                                           <span class="side-menu__label">{{ __('admin.order') }}</span></a>
								</li>
								<li class="slide {{ str_contains(url()->current(), 'admin/features') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.features.index') }}">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/star.png"/>
                                        <span class="side-menu__label">{{ __("admin.Features") }}</span></a>

								</li>
                                <li class="slide {{ str_contains(url()->current(), 'admin/teams') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.teams.index') }}">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/user-group-man-woman.png"/>
                                        <span class="side-menu__label">{{ __('admin.teams') }}</span></a>
								</li>
                                <li class="slide {{ str_contains(url()->current(), 'admin/review') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.reviews.index') }}">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/starburst-shape.png"/><span class="side-menu__label">{{ __('admin.review') }}</span></a>
								</li>
                                <li class="slide {{ str_contains(url()->current(), 'admin/users') ? 'is-expanded' : ''  }}">
									<a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.users.index') }}">
                                        <img width="30" style="margin-inline-end: 14px;" src="https://img.icons8.com/nolan/64/starburst-shape.png"/><span class="side-menu__label">{{ __('Users') }}</span></a>
								</li>
							</ul>
							<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
						</div>
					</aside>
				</div>
