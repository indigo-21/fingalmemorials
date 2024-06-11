@extends('main')
@section('content')
    <div class="breadcrumbs-no-mb">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Customer</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Customer </b></p>
                    </div>
                </div>
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
                                        <th>No.</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr id=tr"{{ $customer->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->firstname }} {{ $customer->surname }}</td>
                                            <td>{{ $customer->address1 }}</td>
                                            <td>{{ $customer->postcode }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->telno }}</td>
                                            <td>{{ $customer->mobile }}</td>
                                            <td class="popover-cl-pro">
                                                <a href=""class="btn btn-primary"
                                                    data-trigger="hover" data-toggle="popover" data-placement="bottom"
                                                    data-content="Add Order"><i class="fa fa-plus"></i></a>
                                                <a href="{{ route('customer.edit', [$customer]) }}"class="btn btn-primary"
                                                    data-trigger="hover" data-toggle="popover" data-placement="bottom"
                                                    data-content="Edit"><i class="fa fa-pencil"></i></a>
                                                <button data-name="{{ $customer->firstname }} {{ $customer->surname }} "
                                                    data-url="customer/destroy" 
                                                    data-id="{{ $customer->id }}"
                                                    class="btn btn-danger deleteCustomer" type="button"
                                                    data-trigger="hover" data-toggle="popover" data-placement="bottom"
                                                    data-content="Delete"><i class="fa fa-trash"></i></button>
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
    <script src="{{ asset('js/delete-script.js') }}"></script>
@endsection
