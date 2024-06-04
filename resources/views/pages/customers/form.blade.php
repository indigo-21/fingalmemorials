@extends ('main')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-content">
                <div class="breadcrumbs-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h3>{{ !isset($id) ? 'Create' : 'Update' }} Customer</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p class="breadcrumbs-link"><a href="">Dashboard</a> / <b>
                                    {{ !isset($id) ? 'Create' : 'Update' }} Customer </b></p>
                        </div>
                    </div>

                    <!-- FOR ERROR HANDLING -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                            </button> 
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> <strong>- </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
             
                    <form method="POST" action=" {{ !isset($customer) ? route('customer.store') : route('customer.update', $customer->id ) }}">
                        @csrf

                        @if (isset($customer))
                                @method('PUT')
                        @endif
            
                        <div class="row" style="margin-top:20px;">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                    <label>Title</label>
                                    <select class="selectpicker" name="title_id">
                                        <option selected disabled>- Title</option>
                                        @foreach($customersTitle as $customerTitle)
                                            @if(isset($customer))
                                                <option value="{{$customerTitle->id}}" {{$customer->title_id == $customerTitle->id ? 'selected' : '' }}>
                                                    {{$customerTitle->name}}
                                                </option>
                                            @else
                                                <option value="{{$customerTitle->id}}" {{old('title_id') == $customerTitle->id ? 'selected' : '' }}>
                                                    {{$customerTitle->name}}
                                                </option>
                                            @endif;
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" 
                                            id="firstname" class="form-control"
                                            placeholder="First Name" value="{{ isset($customer) ? $customer->firstname : old('firstname') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Middle Name</label>
                                    <input type="text" name="middlename" 
                                        id="middlename" class="form-control"
                                        placeholder="Middle Name" value="{{ isset($customer) ? $customer->middlename : old('middlename') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Surname</label>
                                    <input type="text" name="surname" 
                                            id="surname" class="form-control"
                                            placeholder="Surname" value="{{ isset($customer) ? $customer->surname : old('surname') }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Mobile No.</label>
                                    <input type="text" name="mobile" 
                                            id="mobile" class="form-control"
                                            placeholder="Mobile No." value="{{ isset($customer) ? $customer->mobile : old('mobile') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Tel No.</label>
                                    <input type="text" name="telno" 
                                            id="telno" class="form-control"
                                            placeholder="Tel No." value="{{ isset($customer) ? $customer->telno : old('telno') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 1</label>
                                    <input type="text" name="address1" 
                                            id="address1" class="form-control"
                                            placeholder="Address 1" value="{{ isset($customer) ? $customer->address1 : old('address1') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 2</label>
                                    <input type="text" name="address2" 
                                            id="address2" class="form-control"
                                            placeholder="Address 2" value="{{ isset($customer) ? $customer->address2 : old('address2') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Address 3</label>
                                    <input type="text" name="address3" 
                                            id="address3" class="form-control"
                                            placeholder="Address 3" value="{{ isset($customer) ? $customer->address3 : old('address3') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Town</label>
                                    <input type="text" name="town" 
                                            id="town" class="form-control"
                                            placeholder="Town" value="{{ isset($customer) ? $customer->town : old('town') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>County</label>
                                    <input type="text" name="county" 
                                            id="county" class="form-control"
                                            placeholder="County" value="{{ isset($customer) ? $customer->county : old('county') }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="nk-int-st" style="margin-bottom:20px;">
                                    <label>Post Code</label>
                                    <input type="text" name="postcode" 
                                            id="postcode" class="form-control"
                                            placeholder="Post Code" value="{{ isset($customer) ? $customer->postcode : old('postcode') }}">
                                </div>
                            </div>

                        </div>
                        <div class="row mt-20">
                            <div class="col-md-12 text-center ">
                                <a href="javascript:history.back()" type="button" class="btn btn-primary btn-icon-notika waves-effect form-btn form-cancel-btn "> Cancel</a>
                                <button type="submit" class="btn btn-primary btn-icon-notika waves-effect form-btn ">{{isset($customer) ? "Update" : "Create"}}</button>
                                
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
