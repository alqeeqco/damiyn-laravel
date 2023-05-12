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

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card  bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <h5 class="tx-13 tx-white-8 mb-3">{{ __('Users Number') }}</h5>
                            <h2 class="counter mb-0 text-white">{{ auth()->user()->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card  bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <h5 class="tx-13 tx-white-8 mb-3">{{ __('Number Order') }}</h5>
                            <h2 class="counter mb-0 text-white">{{ \App\Models\Order::get()->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card  bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <h5 class="tx-13 tx-white-8 mb-3">{{ __('Dameen Partners') }}</h5>
                            <h2 class="counter mb-0 text-white">{{ \App\Models\Team::get()->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card  bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="ms-auto text-end">
                            <h5 class="tx-13 tx-white-8 mb-3">{{ __('All Review') }}</h5>
                            <h2 class="counter mb-0 text-white">{{ \App\Models\Review::get()->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        {{ __('Order') }}
                    </div>
                    <div class="chartjs-wrapper-demo">
                        <canvas id="chartLine1"></canvas>
                    </div>
                </div>
            </div>

    </div>
    <!-- /row -->


    <!-- row -->
    <div class="row row-sm" style="display: none">
        <div class="col-md-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="main-content-label tx-12 mg-b-15">
                                Solid Color
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar1"></canvas>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-sm-12 col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
                            <div class="main-content-label tx-12 mg-b-15">
                                With Transparency
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar2"></canvas>
                            </div>
                        </div><!-- col-6 -->



                        <div class="col-sm-12 col-md-6 col-xl-4 mg-t-20 mg-xl-t-0">
                            <div class="main-content-label tx-12 mg-b-15">
                                Using Gradient Color
                            </div>
                            <div class="ht-200 ht-lg-250">
                                <canvas id="chartBar3"></canvas>
                            </div>
                        </div><!-- col-6 -->
                    </div>
                </div><!-- col-12 -->
            </div><!-- col-12 -->
        </div><!-- col-12 -->
    </div>
    <!-- /row -->

    <!-- /row -->
@endsection

@section('script')

    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('adminassets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('adminassets/js/chart.chartjs.js') }}"></script>
    <script src="{{ asset('adminassets/js/custom.js') }}"></script>

    <script>
        $(function() {
	'use strict';
	var ctx1 = document.getElementById('chartLine1').getContext('2d');
	new Chart(ctx1, {
		type: 'chartLine1',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			datasets: [{
				label: '# of Votes',
				data: [{{ \App\Models\Order::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('Order_status', '2')->count() }}, {{ \App\Models\Order::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('Order_status', '1')->count() }}, {{ \App\Models\Order::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->where('Order_status', '0')->count() }}],
				backgroundColor: '#285cf7'
			}]
		},
		options: {
			maintainAspectRatio: false,
			responsive: true,
			plugins: {
				legend: {
					display: false,
					labels: {
						display: false
					}
				},
			},
			scales: {
				y: {
					ticks: {
						beginAtZero: true,
						fontSize: 10,
						max: 80,
						fontColor: "rgba(171, 167, 167,0.9)",
					},
					grid: {
						display: true,
						color: 'rgba(171, 167, 167,0.2)',
						drawBorder: false
					},
				},
				x: {
					barPercentage: 0.6,
					ticks: {
						beginAtZero: true,
						fontSize: 11,
						fontColor: "rgba(171, 167, 167,0.9)",
					},
					grid: {
						display: true,
						color: 'rgba(171, 167, 167,0.2)',
						drawBorder: false
					},
				}
			}
		}
	});

        });
    </script>
@endsection
