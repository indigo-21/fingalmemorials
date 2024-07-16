@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($cemeteryGroup) ? 'Update' : 'Create' }} Cemetery Group</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="/">Dashboard</a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                <a href="/cemetery-group">Cemetery Group</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <b> {{ isset($cemeteryGroup) ? 'Update' : 'Create' }} Cemetery Group </b></p>
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

                    <form method="POST" action=" {{ isset($cemeteryGroup) ? route('cemetery-group.update', $cemeteryGroup) : route('cemetery-group.store') }} ">
                        @csrf
                        @if (isset($cemeteryGroup))
                            @method('PUT')
                        @endif
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control"
                                        value="{{ isset($cemeteryGroup) ? $cemeteryGroup->code : old('code') }}" placeholder="Code">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Group Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ isset($cemeteryGroup) ? $cemeteryGroup->name : old('name') }}" placeholder="Group Name">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/cemetery-group"><button type="button"
                                        class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                        Cancel</button></a>
                                <button type="submit"
                                    class="btn btn-primary btn-icon-notika waves-effect form-btn ">{{ isset($cemeteryGroup) ? 'Update' : 'Create' }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
