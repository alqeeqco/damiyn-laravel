@extends('dashboard.include.master')

@section('title')
{{ __('Dashboard') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Show') }}
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">{{ __('users number') }}</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">({{ auth()->user()->count() }})مستخدم</h4>

                        </div>
                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1"><canvas width="392" height="30" style="display: inline-block; width: 392.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">{{ __('Number Order') }}</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">({{ \App\Models\Order::get()->count() }})طلب</h4>
                        </div>
                    </div>
                </div>
            </div>
            <span id="compositeline2" class="pt-1"><canvas width="392" height="30" style="display: inline-block; width: 392.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">{{ __('Dameen Partners') }}</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">({{ \App\Models\Team::get()->count() }})شريك</h4>
                        </div>

                    </div>
                </div>
            </div>
            <span id="compositeline3" class="pt-1"><canvas width="392" height="30" style="display: inline-block; width: 392.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">{{ __('All Review') }}</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">({{ \App\Models\Review::get()->count() }})قول</h4>
                        </div>
                    </div>
                </div>
            </div>
            <span id="compositeline4" class="pt-1"><canvas width="392" height="30" style="display: inline-block; width: 392.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
</div>

<div class="row row-sm">
						<div class="col-lg-12 col-md-12">
							<div class="card mg-b-20">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Line Chart
									</div>
									<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
									<div id="echart2" class="ht-300" _echarts_instance_="ec_1683810426242" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 490px; height: 300px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="490" height="300" style="position: absolute; left: 0px; top: 0px; width: 490px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(172px, 96px, 0px); border-color: rgb(255, 255, 255); pointer-events: none; visibility: hidden; opacity: 0;"><div style="margin: 0px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><div style="font-size:14px;color:#666;font-weight:400;line-height:1;">2014</div><div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><span style="display:inline-block;margin-inline-end:4px;border-radius:10px;width:10px;height:10px;background-color:#285cf7;"></span><span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">sales</span><span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">10</span><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="margin: 10px 0 0;line-height:1;"><div style="margin: 0px 0 0;line-height:1;"><span style="display:inline-block;margin-inline-end:4px;border-radius:10px;width:10px;height:10px;background-color:#f7557a;"></span><span style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Profit</span><span style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">10</span><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div><div style="clear:both"></div></div></div></div>
								</div>
							</div>
						</div>

					</div>

@endsection

@section('script')

<script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/echart/echart.js') }}"></script>
<script src="{{ asset('adminassets/js/echarts.js') }}"></script>
<script src="{{ asset('adminassets/js/custom.js') }}"></script>


@endsection

