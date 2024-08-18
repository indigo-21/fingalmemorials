@extends('main')
@section('content')
    <div class="breadcrumbs-no-mb">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Sage Report</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Sage Report</b></p>
                    </div>
                </div>
                <form>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                                <label>Date Start</label>
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="input-form form-control" 
                                        value=""
                                        name="sage_date_start" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                                <label>Date End</label>
                                <div class="input-group date nk-int-st">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="input-form form-control" 
                                        value=""
                                        
                                        name="sage_date_end" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                                <div>
                                    <div class="col-lg-12">
                                        <div class="header-btn">
                                            <button type="button" id="searchSage" class="btn btn-primary btn-icon-notika waves-effect"><i
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
                            <table id="data-table-sage-report" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Account Number</th>
                                        <th>Date</th>
                                        <th>Order No.</th>
                                        <th>Details</th>
                                        <th>Net</th>
                                        <th>Tax</th>
                                        <th>VAT</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody id="sageReportData">
                                    @foreach($sageReports as $sageReport)
                                        <tr>
                                            <td>
                                                @if($sageReport->account_posting_nominal == "1201")
                                                    <!-- 1201 - IS_PAYMENT_RECEIVED -->
                                                    SA
                                                @elseif($sageReport->account_posting_nominal == "2112")
                                                    <!-- 2112 - IS_DEPOSIT -->
                                                    BR
                                                @else
                                                    <!-- 4100 - IS_INVOICE -->
                                                    SI
                                                @endif
                                            </td>
                                            <td>{{$sageReport->account_number}}</td>
                                            <td>{{date("d/m/Y", strtotime($sageReport->account_posting_date))}}</td>
                                            <td>{{$sageReport->order_id}}</td>
                                            <td>{{$sageReport->detail}}</td>
                                            <td>{{$sageReport->detail}}</td>
                                            <td>
                                                @if($sageReport->account_posting_nominal == "1201")
                                                    <!-- 1201 - IS_PAYMENT_RECEIVED -->
                                                    T0
                                                @elseif($sageReport->account_posting_nominal == "2112")
                                                    <!-- 2112 - IS_DEPOSIT -->
                                                    T9
                                                @else
                                                    <!-- 4100 - IS_INVOICE -->
                                                    T1
                                                @endif 
                                            </td>
                                            <td>{{$sageReport->vat_amount}}</td>
                                            <td>{{$sageReport->created_by_user}}</td>
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
    <script src="{{ asset('js/sage-report.js') }}"></script>
@endsection