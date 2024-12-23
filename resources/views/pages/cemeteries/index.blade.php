@extends('main')
@section('content')
    <div class="breadcrumbs-no-mb">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Cemetery</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="/">Dashboard</a> <i class="fa fa-angle-right" aria-hidden="true"></i>  <b>Cemetery</b></p>
                    </div>
                </div>
                <div class="header-btn-adminutil">
                    <a href="/cemetery/create"><button type="button" class="btn btn-primary btn-icon-notika waves-effect"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i>
                            CREATE</button></a>
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
                                        <th>Code</th>
                                        <th>Cemetery Name</th>
                                        <th>Group </th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cemeteries as $cemetery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cemetery->code }}</td>
                                            <td>{{ $cemetery->name }}</td>
                                            <td>{{ $cemetery->cemeteryGroup->code }}</td>
                                            <td>{{ $cemetery->cemeteryArea->code }}</td>
                                            <td class="popover-cl-pro">
                                                <a href="{{ route('cemetery.edit', [$cemetery]) }}"class="btn btn-primary"
                                                    data-trigger="hover" data-toggle="popover" data-placement="bottom"
                                                    data-content="Edit"><i class="fa fa-pencil"></i></a>
                                                <button data-name="{{ $cemetery->name }}"
                                                    data-url="cemetery/destroy"
                                                    data-id="{{ $cemetery->id }}"
                                                    class="btn btn-danger deleteDataInfo" 
                                                    type="button" 
                                                    data-trigger="hover" 
                                                    data-toggle="popover"
                                                    data-placement="bottom" 
                                                    data-content="Delete"><i
                                                        class="fa fa-trash"></i></button>
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

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection
@section('page-scripts')
    <script src="{{ asset('js/datatables/admin-utilities.js')}} "></script>
    <script src="{{ asset('js/delete-script.js') }}"></script>
@endsection
