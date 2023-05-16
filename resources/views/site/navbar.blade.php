<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="{{ route('site.home') }}">
                    @foreach (\App\Models\Setting::limit(1)->get() as $logo)
                        <img   src="{{ asset('uploads/settings/'.$logo->logo_header) }}" alt="">
                    @endforeach
                </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav  ">
                            <li class="nav-item links ">
                                <a class="nav-link" href="{{ route('site.home') }}">الرئيسية</a>
                            </li>
                            <li class="nav-item links active">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
                            </li>
                            <li class="nav-item links ">
                                <a class="nav-link" href="#">من نحن</a>
                            </li>
                            <li class="nav-item links ">
                                <a class="nav-link" href="{{ route('site.blogs') }}">المقالات</a>
                            </li>

                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            <div class="dropdown">
                                <div>
                                    <button class="btn btn_toggle_name btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ auth()->user()->name }}<br><span>{{ auth()->user()->phone }}</span>
                                      </button>
                                </div>
                                <ul class="dropdown-menu">
                                  <li class="d-flex"><img class="mr-2" width="20" src="{{ asset('webassets/images/blog/frame.svg') }}" alt=""><a class="dropdown-item" href="{{ route('site.profile.edit') }}">الحساب الشخصي</a></li>
                                  <li class="d-flex"><img class="mr-2"   width="20" src="{{ asset('webassets/images/blog/element-4.svg') }}" alt=""><a class="dropdown-item" href="{{ route('site.order/index') }}">طلباتي</a></li>
                                  <li class="d-flex">
                                  <form action="{{ route('site.logout') }}" method="post" class="d-flex">
                                    @csrf
                                        @method('delete')
                                        <img class="mr-2"   width="20" src="{{ asset('webassets/images/blog/login.svg') }}" alt=""><button class="dropdown-item" style="border: 0"> تسجيل الخروج </button>
                                    </form>
                                </li>
                                </ul>
                              </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
