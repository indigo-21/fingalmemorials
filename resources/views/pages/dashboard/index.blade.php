@extends('main')

@section('content')
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    {{-- <div class="breadcomb-icon">
                                        <i class="fa fa-home"></i>
                                    </div> --}}
                                    <div class="breadcomb-ctn">
                                        <h3>Dashboard</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-engine-area mg-t-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int">
                        <div class="contact-hd search-hd-eg">
                            <h2>Latest Orders</h2>
                        </div>
                        <div class="search-eg-table">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Date Job Fixed</th>
                                        <th>Cemetery</th>
                                        <th>Customer</th>
                                        <th>Value</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><a
                                                    href="{{ url('order/edit/general-details') }}/{{ $order->id }}">{{ $order->id }}</a>
                                            </td>
                                            <td>{{ date('m/d/Y', strtotime($order->created_at)) }}</td>
                                            <td>{{$order->cemetery->name }}</td>
                                            <td>{{ $order->customer->firstname }} {{ $order->customer->surname }}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                        <div class="contact-hd search-hd-eg">
                            <h2>Latest Customer</h2>
                        </div>
                        <div class="search-eg-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-right">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                           <tr>
                                            <td>{{ $customer->firstname }} {{ $customer->surname }}</td>
                                            <td class="text-right">{{ substr($customer->created_at,0,10) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
