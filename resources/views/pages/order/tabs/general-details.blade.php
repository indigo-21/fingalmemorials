@extends ('pages.order.form')
@section('tab-general-details')
    <div>
        <div class="row mt-50">
            <h3 class="title text-center">General Details</h3>
            <div class="col-12 col-md-6">
                <h4 class="title-header title-header-md">Order Details</h4>
                <div class="nk-int-st mb-20">
                    <label>Order Headline</label>
                    <input type="text" class="input-form form-control" placeholder="Headline" 
                        value="{{isset($order) ? $order->order_headline : ''}}"
                        name="order_headline">
                </div>
                <div class="chosen-select-act fm-cmp-mg mb-20">
                    <label>Cemetery</label>
                    <select class="input-form selectpicker" data-placeholder="" id="input-cemetery" name="cemetery_id"
                        data-live-search="true">
                        <option disabled selected value="">Choose a Cemetery...</option>
                        @php
                            $group_area     = "";
                            $fixing_area    = "";
                        @endphp

                        @foreach($cemeteries as $cemetery)
                            <option 
                                group="{{$cemetery->cemeteryGroup->name}}"
                                area="{{$cemetery->cemeteryArea->name}}" 
                                @if(isset($order))
                                        @php 
                                            $group_area     = $order->cemetery_id == $cemetery->id ? $cemetery->cemeteryGroup->name : '';
                                            $fixing_area    = $order->cemetery_id == $cemetery->id ? $cemetery->cemeteryArea->name : '';
                                        @endphp

                                        {{$order->cemetery_id == $cemetery->id ? 'selected' : ''}}
                                @endif
                                value="{{$cemetery->id}}">{{$cemetery->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="nk-int-st" style="margin-bottom:20px;">
                    <label>Cemetery Group</label>
                    <input type="text" disabled  class="input-form form-control" placeholder="Fixing Area" 
                        @if(isset($order))
                            value="{{$group_area}}"
                        @endif
                        name="cemetery_group" id="cemetery_group">
                </div>
                <div class="nk-int-st" style="margin-bottom:20px;">
                    <label>Fixing Area</label>
                    <input type="text" disabled  class="input-form form-control" placeholder="Fixing Area" 
                        @if(isset($order))
                            value="{{$fixing_area}}"
                        @endif
                        name="area" id="cemetery_area">
                </div>
                <div class="nk-int-st" style="margin-bottom:20px;">
                    <label>Plot / Grave</label>
                    <input type="text" class="input-form form-control" placeholder="Plot/Grave" 
                        value="{{isset($order) ? $order->plot_grave : ''}}"
                    name="plot_grave">
                </div>


                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Grave Space:</label>
                    <select class="selectpicker" name="grave_space_id" data-live-search="true">
                        <option value="" selected disableds>-- SELECT GRAVE SPACE --</option>
                        @foreach ($graveSpaces as $graveSpace)
                            <option value="{{ $graveSpace->id }}"
                                @if(isset($order))
                                        {{$order->grave_space_id == $graveSpace->id ? 'selected' : ''}}
                                @endif
                            >{{ $graveSpace->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="nk-int-st" style="margin-bottom:20px;">
                    <label>Special Instructions</label>
                    <textarea class="form-control" placeholder="Special Instructions" style="height:90px;" name="special_instructions">{{isset($order) ? $order->special_instructions : ''}}</textarea>
                </div>
            </div>
            
            <div class="col-12 col-md-6">
                <h4 class="title-header title-header-md">Approvals</h4>
                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Order Complete:</label>
                    <select class="input-form selectpicker" name="order_complete" {{ isset($order) ? '' : 'disabled' }} >
                        <option value=""></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="inscription_completed"
                                @if (isset($order)) {{ $order->inscription_completed == '1' ? 'checked' : '' }}
                            @else   
                                disabled @endif>
                            <label class="form-check-label">Inscription Completed</label>
                        </div>
                        {{-- <div class="fm-checkbox">
                            <label>
                                    <input type="checkbox" class="input-form i-checks" name="inscription_completed"
                                        @if(isset($order))
                                                {{$order->inscription_completed == "1" ? 'checked' : ''}}
                                        @else   
                                            disabled
                                        @endif
                                    > 
                                    <i></i> Inscription Completed
                            </label>
                        </div> --}}
                    </div>
                    <div class="col-md-7">
                        <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                            <label>Inscription Completed Date</label>
                            <div class="input-group date nk-int-st">
                                <span class="input-group-addon"></span>
                                <input type="text" class="input-form form-control" name="inscription_completed_date"
                                    @if(isset($order))
                                        value="{{$order->inscription_completed_date ? date('d/m/Y', strtotime($order->inscription_completed_date)) : '' }}"
                                    @else
                                        disabled
                                        value=""
                                    @endif
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-datapk-ctm form-elet-mg" id="data_1" style="margin-bottom:20px;">
                    <label>Job was fixed on</label>
                    <div class="input-group date nk-int-st">
                        <span class="input-group-addon"></span>
                        <input type="text" class="input-form form-control"
                        
                        @if(isset($order))
                            value="{{$order->job_was_fixed_on ? date('d/m/Y', strtotime($order->job_was_fixed_on)) : '' }}"
                        @else
                            value=""
                            disabled
                        @endif

                        name="job_was_fixed_on" >
                    </div>
                </div>
                
                
                <h4 class="title-header title-header-md" style="margin-top:50px;">Analysis Codes</h4>
                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Source:</label>
                    <select class="input-form selectpicker" name="source_id" data-live-search="true">
                        <option selected disabled value="">Source</option>
                        @foreach($sources as $source)
                            <option value="{{$source->id}}"
                                @if(isset($order))
                                        {{$order->source_id == $source->id ? 'selected' : ''}}
                                @endif
                            >{{$source->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Category:</label>
                    <select class="input-form selectpicker" name="category_id" data-live-search="true">
                        <option selected disabled value="">Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($order))
                                        {{$order->category_id == $category->id ? 'selected' : ''}}
                                @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-40" id="customer_form">
            <h3 class="title text-center">Customer Details</h3>


            @if (!isset($order))
                <div class="col-12 col-md-12 mb-10">
                    <div class="customer-exists text-center">
                        <h4>Does this customer already exists?</h4>
                        <div class="form-check">
                            <span style="margin-right:10px;">
                                <input class="form-check-input checkBox-newCustomer" type="radio" isexist="1" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </span>
                            <span>
                                <input class="form-check-input checkBox-newCustomer" type="radio" isexist="0" name="flexRadioDefault"
                                    id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg mb-20 choose-customer-text" hidden="true">
                        <label>Customers</label>
                        <select class="input-form selectpicker chosen-customer" id="searchCustomer" data-placeholder="" name="customer"
                            data-live-search="true">
                            <option disabled selected>Choose a Customer...</option>
                            @php
                                $fixing_area = '';
                            @endphp

                            @foreach ($customers as $findCustomer)
                                <option value="{{ $findCustomer->id }}" class="customer_info_{{$findCustomer->id}}"
                                    @if(isset($customerId) && $findCustomer->id == $customerId )
                                        selected
                                    @endif
                                > {{ $findCustomer->firstname }} {{ $findCustomer->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif


            <div class="customer-form"  {{ !isset($order) ? "hidden" : "" }}>
                <div class="col-12 col-md-6 ">
                    <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                        <label>Title:</label>
                        <select class="input-form selectpicker" name="title_id">
                            <option selected disabled >- Title</option>
                            @foreach ($titles as $title)
                                <option value="{{ $title->id }}"
                                    @if (isset($customer)) {{ $customer->title_id == $title->id ? 'selected' : '' }} @endif>
                                    {{ $title->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>First Name</label>
                        <input type="text" class="input-form form-control" placeholder="Firstname"
                            @if (isset($customer)) value="{{ $customer->firstname }}" @endif name="firstname">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Middle Name</label>
                        <input type="text" class="input-form form-control" placeholder="Middlename"
                            @if (isset($customer)) value="{{ $customer->middlename }}" @endif
                            name="middlename">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Last Name</label>
                        <input type="text" class="input-form form-control" placeholder="Lastname"
                            @if (isset($customer)) value="{{ $customer->surname }}" @endif name="surname">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Mobile</label>
                        <input type="text" class="input-form form-control" placeholder="Mobile"
                            @if (isset($customer)) value="{{ $customer->mobile }}" @endif name="mobile">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Tel No</label>
                        <input type="text" class="input-form form-control" placeholder="Tel No"
                            @if (isset($customer)) value="{{ $customer->telno }}" @endif name="telno">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Email</label>
                        <input type="text" class="input-form form-control " placeholder="Enter Email"
                            @if (isset($customer)) value="{{ $customer->email }}" @endif name="email">
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="nk-int-st mb-20">
                        <label>Address 1</label>
                        <input type="text" class="input-form form-control" placeholder="Address 1"
                            @if (isset($customer)) value="{{ $customer->address1 }}" @endif name="address1">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Address 2</label>
                        <input type="text" class="input-form form-control" placeholder="Address 2"
                            @if (isset($customer)) value="{{ $customer->address2 }}" @endif name="address2">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Address 3</label>
                        <input type="text" class="input-form form-control" placeholder="Address 3"
                            @if (isset($customer)) value="{{ $customer->address3 }}" @endif name="address3">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Town</label>
                        <input type="text" class="input-form form-control" placeholder="Town"
                            @if (isset($customer)) value="{{ $customer->town }}" @endif name="town">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>County</label>
                        <input type="text" class="input-form form-control" placeholder="County"
                            @if (isset($customer)) value="{{ $customer->county }}" @endif name="county">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Postcode</label>
                        <input type="text" class="input-form form-control" placeholder="Postcode"
                            @if (isset($customer)) value="{{ $customer->postcode }}" @endif name="postcode">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Account Number</label>
                        <input type="text" disabled class="input-form form-control" placeholder="MON01" value="MON01"  name="account_number">
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-20">
            <div class="col-md-12 text-center" id="general_details_buttons">
                <div class="form-btn">
                    @if (isset($order) && isset($customer))
                        <a href="{{ url('/order') }}" class="btn btn-light btn-icon-notika waves-effect">Back</a>
                        <button class="btn btn-primary btn-icon-notika waves-effect edit-submit"
                            orderid="{{ $order->id }}" customerid="{{ $customer->id }}">Update</button>
                    @else
                        <a href="{{ url('/order') }}" class="btn btn-light btn-icon-notika waves-effect">Cancel</a>
                        <button class="btn btn-primary btn-icon-notika waves-effect create-submit">Create</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{ asset('js/tabs/general-details.js') }}"></script>
@endsection
