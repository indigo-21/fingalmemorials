@extends ('main')
@section('content')

    <div class="form-container" id="order_form" hasinvoice="{{isset($hasInvoice) ? $hasInvoice : 'true' }}">
        <div class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-content">
                    <div class="breadcrumbs-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h3>{{isset($order) ? "Update" : "Create" }} Orders</h3>
                                @if(isset($order))
                                    <div class="order-status open-order">
                                        <span><b>Status:</b> Open Order</span>
                                    </div>
                                    <div class="order-status invoiced">
                                        <span><b>Status:</b> Invoiced</span>
                                    </div>
                                    <div class="order-status order-cancelled">
                                        <span><b>Status:</b> Order Cancelled</span>
                                    </div>
                                    <div class="order-status complete-order">
                                        <span><b>Status:</b> Complete Order</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Orders</b></p>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <h4 class="title-header title-header-md">Order Details</h4>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Order No.</label>
                                    <input type="text" class="form-control" placeholder="" id="order-number" disabled value="{{isset($order) ? $order->id : ''}}">
                                </div>
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Type:</label>
                                    <select class="input-form selectpicker" name="order_type_id">
                                        @foreach ($orderTypes as $orderType)
                                            <option value="{{$orderType->id}}" 
                                                @if(isset($order))
                                                    {{$order->order_type_id == $orderType->id ? 'selected' : ''}}
                                                @endif
                                            >{{$orderType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 divider-left">
                                <div class="empty-div"></div>
                                <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                                    <label>Order Date</label>
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-form form-control" 
                                            @if(isset($order))
                                                value="{{date('m/d/Y', strtotime($order->created_at)) }}"
                                            @else
                                                value="{{date('m/d/Y')}}"
                                            @endif
                                            
                                            name="order_date" >
                                    </div>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Branch:</label>
                                    <select class="input-form selectpicker" name="order_branch">
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}"
                                                @if(isset($order))
                                                        {{$order->branch_id == $branch->id ? 'selected' : ''}}
                                                @endif
                                            >{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 divider-left">
                                <h4 class="title-header">Deceased Details</h4>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Deceased Name</label>
                                    <input type="text" class="input-form form-control" placeholder="" 
                                        value="{{isset($order) ? $order->deceased_name : ''}}"
                                        name="deceased_name">
                                </div>
                                <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                                    <label>Date of Death</label>
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="input-form form-control" value="{{date('m/d/Y')}}" name="date_of_death">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 divider-left">
                                <h4 class="title-header title-header-md">Order Totals</h4>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Value</label>
                                    <input type="text" class="input-form form-control" placeholder="" id="order-value" value="{{number_format($jobValue, 2)}}" disabled>
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Balance</label>
                                    <input type="text" class="input-form form-control" placeholder="" id="order-balances" value="{{number_format($orderBalance, 2)}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tabs-info-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="widget-tabs-int">
                                            <div class="widget-tabs-list">
                                                <ul class="nav nav-tabs order-tabs" style="{{ Request::segment(2) === 'create' ? 'display:none;' : 'display:flex;'}}">
                                                    @foreach ($tabs as $key => $tab)
                                                        <li class="{{ $tab === Request::segment(3) ? 'active' : '' }} 
                                                                    @if($key != 0) 
                                                                        {{ isset($order) && isset($customer) ? '' : 'disabled' }}
                                                                    @endif">
                                                            <a role="tab" 
                                                                @if( isset($order) )
                                                                    href="{{ url('order/edit/'. $tab) }}/{{$order->id}}"
                                                                @else
                                                                    href="{{ url('order/create/' . $tab) }}"
                                                                @endif
                                                            >
                                                                <i class="fa {{ $icons[$key] }}" aria-hidden="true"></i>
                                                                {{ str_replace('-', ' ', ucfirst($tab)) }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content tab-custom-st">
                                                        <!-- Error Display -->
                                                            <div class="error-display" id="error_container">
                          
                                                            </div>
                                                        <!-- Error Display -->

                                                        <div id="general-details"
                                                            class="tab-pane fade in {{ 'general-details' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-general-details')
                                                            </div>
                                                        </div>
                                                        <div id="job-details"
                                                            class="tab-pane fade in {{ 'job-details' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-job-details')
                                                            </div>
                                                        </div>
                                                        <div id="inscription-details"
                                                            class="tab-pane fade in {{ 'inscription-details' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-inscription-details')
                                                            </div>
                                                        </div>
                                                        <div id="accounts-posting"
                                                            class="tab-pane fade in {{ 'accounts-posting' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-accounts-posting')
                                                            </div>
                                                        </div>
                                                        <div id="document"
                                                            class="tab-pane fade in {{ 'document' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-document')
                                                            </div>
                                                        </div>
                                                        <div id="document"
                                                            class="tab-pane fade in {{ 'email' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-email')
                                                            </div>
                                                        </div>
                                                        <div id="print-history"
                                                            class="tab-pane fade in {{ 'print-history' === Request::segment(3) ? 'active' : '' }}"
                                                            role="tabpanel">
                                                            <div class="tab-ctn">
                                                                @yield('tab-print-history')
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('page-scripts')
   
@endsection
