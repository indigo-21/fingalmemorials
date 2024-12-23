@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($id) ? 'Update' : 'Create' }} Order Types</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="/">Dashboard</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="/order-types">Order Types</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <b> {!! isset($id) ? 'Update' : 'Create' !!} Order Types </b>
                            </p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> <strong>- </strong>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                        action=" {{ isset($id) ? route('updateOrderType', $id) : route('createOrderType') }} ">
                        @if (isset($id))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ isset($orderType) ? $orderType->name : old('name') }}" placeholder="Name">
                                </div>
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Status</label>
                                    <select class="selectpicker" name="active">
                                        <option value="">-- SELECT Status --</option>
                                        @if (isset($orderType))
                                            <option value="1" {{ $orderType->active == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $orderType->active == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        @else
                                            <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        @endif

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/order-types"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                    Cancel</a>
                                <button type="submit"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn ">{{ isset($id) ? 'Update' : 'Create' }}</button>

                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
