@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($cemetery) ? 'Update' : 'Create' }} Cemetery</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>
                                    {{ isset($cemetery) ? 'Update' : 'Create' }} Cemetery </b></p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> <strong>- </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                        action=" {{ isset($cemetery) ? route('cemetery.update', $cemetery) : route('cemetery.store') }} ">

                        @csrf
                        @if (isset($cemetery))
                            @method('PUT')
                        @endif
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->code : '' }}" placeholder="Code">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->name : '' }}" placeholder="Name">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->email : '' }}" placeholder="Email">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->phone : '' }}" placeholder="Phone">
                                </div>
                                <div class="chosen-select-act fm-cmp-mg mb-20">
                                    <label>Group</label>
                                    <select class="chosen" data-placeholder="Choose a Group..." name="cemetery_group_id">
                                        <option value="">-- SELECT GROUP --</option>
                                        @foreach ($cemeteryGroups as $cemeteryGroup)
                                            <option value="{{ $cemeteryGroup->id }}" {{ isset($cemetery) && ( $cemeteryGroup->id == $cemetery->cemetery_group_id) ? 'selected' : '' }}>{{ $cemeteryGroup->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg mb-20">
                                    <label>Area</label>
                                    <select class="chosen" data-placeholder="Choose an Area..." name="cemetery_area_id">
                                        <option value="">-- SELECT AREA --</option>
                                        @foreach ($cemeteryAreas as $cemeteryArea)
                                            <option value="{{ $cemeteryArea->id }}" {{ isset($cemetery) && ( $cemeteryArea->id == $cemetery->cemetery_area_id) ? 'selected' : '' }}>{{ $cemeteryArea->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 1</label>
                                    <input type="text" name="address1" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->address1 : '' }}" placeholder="Address 1">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 2</label>
                                    <input type="text" name="address2" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->address2 : '' }}" placeholder="Address 2">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 3</label>
                                    <input type="text" name="address3" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->address3 : '' }}" placeholder="Address 3">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Town</label>
                                    <input type="text" name="town" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->town : '' }}" placeholder="Town">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>County</label>
                                    <input type="text" name="county" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->county : '' }}" placeholder="County">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Postcode</label>
                                    <input type="text" name="postcode" class="form-control"
                                        value="{{ isset($cemetery) ? $cemetery->postcode : '' }}" placeholder="Postcode">
                                </div>


                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/cemetery"><button type="button"
                                        class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                        Cancel</button></a>
                                <button type="submit"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn ">{{ isset($cemetery) ? 'Update' : 'Create' }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
