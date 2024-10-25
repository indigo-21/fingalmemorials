@extends('main')
@section('content')
    <div class="breadcrumbs-no-mb">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Order Report</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Order Report</b></p>
                    </div>
                </div>
                <form>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                                <label>Order Date Start</label>
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="input-form form-control" 
                                        value="{{$orderDateStart}}"
                                        
                                        name="order_date_start" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-datapk-ctm form-elet-mg" id="data_1_2" style="margin-bottom:20px;">
                                <label>Order Date End</label>
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="input-form form-control" 
                                        value="{{$orderDateEnd}}"
                                        
                                        name="order_date_end" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                                <div>
                                    <div class="col-lg-12">
                                        <div class="header-btn">
                                            <button type="button" id="searchOrder" class="btn btn-primary btn-icon-notika waves-effect"><i
                                                    class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-order-report" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Date</th>
                                        <th>Branch</th>
                                        <th>Order Type</th>
                                        <th>Order Headline</th>
                                        <th>Customer</th>
                                        <th>Value</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="orderReportData">
                                    @foreach($orderReports as $orderReport)
                                        <tr>
                                            <td>{{ $orderReport->id }}</td>
                                            <td>{{ isset($orderReport->order_date) ? date('d/m/Y', strtotime($orderReport->order_date)) : "-"   }}</td>
                                            <td>{{ $orderReport->branch_name }}</td>
                                            <td>{{ $orderReport->order_type_name }}</td>
                                            <td>{{ $orderReport->order_headline }}</td>
                                            <td>{{ $orderReport->customer_name }}</td>
                                            <td>{{ $orderReport->value == "" ? "0" : $orderReport->value }}</td>
                                            <td>{{ $orderReport->balance == "" ? "0" : $orderReport->balance }}</td>
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
@section('page-scripts')
    <script src="{{ asset('js/order-report.js') }}"></script>
@endsection