@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ isset($analysis) ? 'Update' : 'Create' }} Analysis</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="/">Dashboard</a> <i class="fa fa-angle-right"
                                    aria-hidden="true"></i>
                                <a href="/analysis">Analysis</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <b>{{ isset($analysis) ? 'Update' : 'Create' }} Analysis</b>
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
                                    <li> <strong>- </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                        action=" {{ isset($id) ? route('updateAnalysis', $id) : route('createAnalysis') }} ">
                        @if (isset($id))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Branch</label>
                                    <select class="selectpicker" name="branch_id">
                                        <option value="">-- SELECT BRANCH --</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}"
                                                {{ isset($id) && $branch->id == $analysis->branch_id ? 'selected' : '' }}
                                                >
                                                {{ $branch->code }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Code</label>
                                    <input type="text" name="code" class="form-control"
                                        value="{{ isset($analysis) ? $analysis->code : old('code') }}" placeholder="Town">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ isset($analysis) ? $analysis->description : old('description') }}" placeholder="Description">
                                </div>
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" class="form-control"
                                        value="{{ isset($analysis) ? $analysis->nominal : old('nominal') }}" placeholder="Nominal">
                                </div>

                            </div>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="/analysis"
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
