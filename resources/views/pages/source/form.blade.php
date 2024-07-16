@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($source) ? 'Update' : 'Create' }} Source</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="/">Dashboard</a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                <a href="/source">Source</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <b>{{ isset($source) ? 'Update' : 'Create' }} Source </b></p>
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

                    <form method="POST" action=" {{ isset($source) ? route('source.update', $source) : route('source.store') }} ">
                        @csrf
                        @if (isset($source))
                            @method('PUT')
                        @endif
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control"
                                        value="{{ isset($source) ? $source->code : old('code') }}" placeholder="Code">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Source Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ isset($source) ? $source->name : old('name') }}" placeholder="Source Name">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/source"><button type="button"
                                        class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn ">
                                        Cancel</button></a>
                                <button type="submit" class="btn btn-primary btn-icon-notika waves-effect form-btn ">{{ isset($source) ? 'Update' : 'Create' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
