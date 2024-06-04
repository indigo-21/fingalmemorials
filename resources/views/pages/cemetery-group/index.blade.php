@extends('main')
@section('content')
    <div class="breadcrumbs-no-mb">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Cemetery Group</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>Cemetery Group</b></p>
                    </div>
                </div>

                <div class="header-btn-adminutil">
                    <a href="/cemetery-group/create"><button type="button"
                            class="btn btn-primary btn-icon-notika waves-effect"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>
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
                                        <th>Group Name</th>
                                        <th>Last update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cemeteryGroups as $cemeteryGroup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cemeteryGroup->code }}</td>
                                            <td>{{ $cemeteryGroup->name }}</td>
                                            <td>{{ $cemeteryGroup->updated_at }}</td>
                                            <td class="popover-cl-pro">
                                                <a href="{{ route('cemetery-group.edit', [$cemeteryGroup]) }}"class="btn btn-primary"
                                                    data-trigger="hover" data-toggle="popover" data-placement="bottom"
                                                    data-content="Edit"><i class="fa fa-pencil"></i></a>
                                                <button data-name="{{ $cemeteryGroup->name }}"
                                                    data-url="cemetery-group/destroy"
                                                    data-id="{{ $cemeteryGroup->id }}"
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
    <script src="{{ asset('js/delete-script.js') }}"></script>
@endsection
