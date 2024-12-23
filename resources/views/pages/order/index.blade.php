@extends('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Orders</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Orders</b></p>
                    </div>
                </div>
                <form>
                    <div class="row" style="margin-top:40px;">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Order Type:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" name="order_type_id" data-live-search="true">
                                        <option value="0">All</option>
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
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Order Date:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="selectpicker" name="order_month">
                                            @foreach ($orderDates as $orderDate)
                                                <option {{ date("m") == "01" ? "selected" : "" }} value="01">January</option>
                                                <option {{ date("m") == "02" ? "selected" : "" }} value="02">February</option>
                                                <option {{ date("m") == "03" ? "selected" : "" }} value="03">March</option>
                                                <option {{ date("m") == "04" ? "selected" : "" }} value="04">April</option>
                                                <option {{ date("m") == "05" ? "selected" : "" }} value="05">May</option>
                                                <option {{ date("m") == "06" ? "selected" : "" }} value="06">June</option>
                                                <option {{ date("m") == "07" ? "selected" : "" }} value="07">July</option>
                                                <option {{ date("m") == "08" ? "selected" : "" }} value="08">August</option>
                                                <option {{ date("m") == "09" ? "selected" : "" }} value="09">September</option>
                                                <option {{ date("m") == "10" ? "selected" : "" }} value="10">October</option>
                                                <option {{ date("m") == "11" ? "selected" : "" }} value="11">November</option>
                                                <option {{ date("m") == "12" ? "selected" : "" }} value="12">December</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" name="order_year">
                                            @foreach ($orderDates as $orderDate)
                                                <option 
                                                    {{$orderDate->year_list == date("Y") ? "selected":""}}
                                                    value="{{$orderDate->year_list}}" >{{$orderDate->year_list}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Branch:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" name="branch">
                                    <option value="0">All</option>
                                    @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}"
                                            >{{$branch->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Order Status:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" name="invoice_status">
                                    <option value="0">All</option>
                                    <option value="1">Open Order</option>
                                    <option value="2">Invoiced - No Editing</option>
                                    <option value="3">Order Cancelled</option>
                                    <option value="4">Order Complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Search:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="selectpicker" name="search_field">
                                            <option value="">Search Field</option>
                                            <option value="order_no">Order No.</option>
                                            <option value="customer_lastname">Customer Lastname</option>
                                            <option value="invoice_no">Invoice No.</option>
                                            <option value="deceased">Deceased</option>
                                            <option value="grave_no">Grave No.</option>
                                            <option value="phone_no">Phone No.</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Search" name="search_input" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                                <div>
                                    <div class="col-lg-6">
                                        <div class="header-btn">
                                            <button type="button" class="btn btn-primary btn-icon-notika waves-effect search-order" id="search-order"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="header-btn">
                                            <a href="/order/create/general-details">
                                                <button type="button" class="btn btn-primary btn-icon-notika waves-effect" ><i class="fa fa-plus-circle" aria-hidden="true"></i> CREATE</button>
                                            </a>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-size:90%;">Order No.</th>
                                        <th style="font-size:90%;">Date</th>
                                        <th style="font-size:90%;">Branch</th>
                                        <th style="font-size:90%;">Order Type</th>
                                        <th style="font-size:90%;">Customer</th>
                                        <th style="font-size:90%;">Deceased Name</th>
                                        <th style="font-size:90%;">Cemetery List</th>
                                        <th style="font-size:90%;">Status</th>
                                        <th style="font-size:90%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="order_table_row">
                                    @foreach($orders as $order)
                                    <tr>
                                        <td style="font-size:90%;text-align:center;"><a href="{{url('order/edit/general-details')}}/{{$order->id}}">{{$order->id}}</a></td>
                                        <td style="font-size:90%;">{{ date('d/m/Y', strtotime($order->created_at))}}</td>
                                        <td style="font-size:90%;">{{$order->branch->name}}</td>
                                        <td style="font-size:90%;">{{$order->orderType->name}}</td>
                                        <td style="font-size:90%;">{{$order->customer->firstname}} {{$order->customer->middlename}} {{$order->customer->surname}}</td>
                                        <td style="font-size:90%;">{{$order->deceased_name ? $order->deceased_name :  "-"}}</td>
                                        <td style="font-size:90%;">{{isset($order->cemetery->name) ? $order->cemetery->name : "-" }}</td>
                                        <!-- <td style="font-size:90%;">{{$order->user->firstname}} {{$order->user->lastname}}</td> -->
                                        
                                        <td style="font-size:90%;">
                                            @if($order->status_id == "1")
                                                <div class="open-order">
                                                    Open Order
                                                </div>                            
                                            @elseif($order->status_id == "2")
                                                <div class="invoiced">
                                                    Invoiced - No Editing
                                                </div>  
                                            @elseif($order->status_id == "3")
                                                <div class="order-cancelled">
                                                    Order Cancelled
                                                </div>
                                            @else
                                                <div class="complete-order">
                                                   Order Complete
                                                </div>
                                            @endif
                                        </td>
                                        <td style="font-size:90%;" class="popover-cl-pro">
                                            <a href="{{url('order/edit/general-details')}}/{{$order->id}}" class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="Edit"><i class="fa fa-pencil"></i></a>
                                            <!-- <button class="btn btn-danger" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="Delete"><i class="fa fa-trash"></i></button> -->
                                        </td>
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
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
