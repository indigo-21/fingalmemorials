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
                                <select class="selectpicker">
                                    <option>Drama</option>
                                    <option>Cariska</option>
                                    <option>Cheriska</option>
                                    <option>Malias</option>
                                    <option>Kamines</option>
                                    <option>Austranas</option>
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
                                        <select class="selectpicker">
                                            <option>Month</option>
                                            <option>Cariska</option>
                                            <option>Cheriska</option>
                                            <option>Malias</option>
                                            <option>Kamines</option>
                                            <option>Austranas</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="selectpicker">
                                            <option>Year</option>
                                            <option>Cariska</option>
                                            <option>Cheriska</option>
                                            <option>Malias</option>
                                            <option>Kamines</option>
                                            <option>Austranas</option>
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
                                <select class="selectpicker">
                                    <option>Drama</option>
                                    <option>Cariska</option>
                                    <option>Cheriska</option>
                                    <option>Malias</option>
                                    <option>Kamines</option>
                                    <option>Austranas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk sl-dp-mn">
                                <h2>Invoice Status:</h2>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker">
                                    <option>Drama</option>
                                    <option>Cariska</option>
                                    <option>Cheriska</option>
                                    <option>Malias</option>
                                    <option>Kamines</option>
                                    <option>Austranas</option>
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
                                        <select class="selectpicker">
                                            <option>Search Field</option>
                                            <option>Cariska</option>
                                            <option>Cheriska</option>
                                            <option>Malias</option>
                                            <option>Kamines</option>
                                            <option>Austranas</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Search">
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
                                            <button type="submit" class="btn btn-primary btn-icon-notika waves-effect"><i class="fa fa-search" aria-hidden="true"></i> SEARCH</button>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Date</th>
                                        <th>Fixing Date</th>
                                        <th>Branch</th>
                                        <th>Order Type</th>
                                        <th>Customer</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td><a href="{{url('order/edit/general-details')}}/{{$order->id}}">{{$order->id}}</a></td>
                                        <td>{{ date('m/d/Y', strtotime($order->created_at))}}</td>
                                        <td>{{ date('m/d/Y', strtotime($order->job_was_fixed_on))}}</td>
                                        <td>{{$order->branch->name}}</td>
                                        <td>{{$order->orderType->name}}</td>
                                        <td>{{$order->customer->firstname}} {{$order->customer->middlename}} {{$order->customer->surname}}</td>
                                        <td>{{$order->user->firstname}} {{$order->user->surname}}</td>
                                        <td class="popover-cl-pro">
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
