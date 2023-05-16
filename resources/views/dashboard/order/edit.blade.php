@extends('dashboard.include.master')

@section('title')
{{ __('Order') }}
@endsection
@section('titlecontent')
{{ __('Dashboard') }}
@endsection
@section('titlelinkcontent')
<a href="{{ route('admin.order.index') }}">{{ __('Order') }}</a>
@endsection
@section('titleparhcontent')
{{ __('Edit') }}
@endsection
@section('content')

    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.order.update',$data['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Number Orders') }}</label>
                            <input type="text" name="number_orders" value="{{ old('number_orders',$data['number_orders']) }}" placeholder="title " class="form-control">
                            @error('number_orders')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{ __('Mobile User') }}</label>
                            <input type="text" name="mobile_user" class="form-control" value="{{ old('mobile_user',$data['mobile_user']) }}">
                            @error('mobile_user')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> {{ __('Order status') }}</label>
                        <select name="order_status" id="order_status" class="form-control">
                            <option value="">--Select-- </option>
                            <option @if (old('order_status', $data['order_status']) == 1) selected="selected" @endif value="1">
                                مكتمل </option>
                            <option @if (old('order_status', $data['order_status']) == 2) selected="selected" @endif value="2">
                                بانتظار الدفع </option>
                            <option @if (old('order_status', $data['order_status']) == 3) selected="selected" @endif value="3">
                                قيد التنفيذ</option>
                        </select>
                        @error('order_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{ __('Order Type') }} </label>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value=""> --select--</option>
                                <option {{  old('order_type',$data['order_type']) == 1 ?'selected' : ''}}  value="1"> منتج
                                </option>
                                <option {{  old('order_type',$data['order_type']) == 0 ?'selected' : ''}}  value="0"> خدمة</option>
                            </select>
                            @error('order_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">{{ __('Show Order') }}</label>
                        <textarea name="show_order_en"id="" cols="30" class ="form-control" rows="1">{{ old('show_order',$data['show_order']) }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">{{ __('Show Order') }}</label>
                        <textarea name="show_order_ar"id="" cols="30" class ="form-control" rows="1">{{ old('show_order_ar',$data['show_order_ar']) }}</textarea>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{ __('Active') }} </label>
                            <select name="active" id="active" class="form-control">
                                <option value=""> --select--</option>
                                <option {{  old('active',$data['active']) == 1 ?'selected' : ''}}  value="1"> Yes
                                </option>
                                <option {{  old('active',$data['active']) == 2 ?'selected' : ''}}  value="2"> No</option>
                            </select>
                            @error('active')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ __('Edit') }}</button>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-dark pd-x-30 mg-t-5">{{ __('Cancel') }}</a>

                </div>
               </form>
            </div>
        </div>
    </div>

@endsection
