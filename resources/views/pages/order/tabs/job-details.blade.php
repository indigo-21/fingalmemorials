@extends ('pages.order.form')
@section('tab-job-details')
    <div class="job-details-field mt-40 mb-40">
		<h3 class="title text-center">Job Details</h3>
        <form action="GET" >
            <div class="row mt-50">
                <div class="col-12 col-md-3">
                    <div class="nk-int-st mb-20">
                        <label>Details of work</label>
                        <input type="text" class="form-control" placeholder="Details of work"
                                name="details_of_work" value="">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;" >
                        <label>Analysis:</label>
                        <select class="selectpicker" name="analysis_id">
                            <option selected disabled>- Analysis</option>
                            @foreach($analyses as $analysis)
                                <option class="option-analysis" value="{{$analysis->id}}">{{$analysis->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="col-12 col-md-3">
                    <div class="nk-int-st mb-20">
                        <label>Gross</label>
                        <input type="text" class="form-control" placeholder="Gross" name="gross">
                    </div>
                    <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;" >
                        <label>VC:</label>
                        <select class="selectpicker" name="vat_code_id">
                            <option disabled selected>- Vat Code</option>
                            @foreach($vatCodes as $vatCode)
                                <option value="{{$vatCode->id}}">{{$vatCode->vat_description}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="col-12 col-md-3">
                    <div class="nk-int-st mb-20">
                        <label>VAT</label>
                        <input type="text" class="form-control" placeholder="VAT" name="vat" id="vat">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Net</label>
                        <input type="text" class="form-control" placeholder="Nett" name="net">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="nk-int-st mb-20">
                        <label>Discount</label>
                        <input type="text" class="form-control" placeholder="Discount" name="discount">
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12 text-right" id="job_details_buttons">
                    <div class="form-btn">
                        <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                        <button class="btn btn-primary btn-icon-notika waves-effect add-job-detail" type="button" orderid="{{$order->id}}">Add</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-list">
                <div class="table-responsive">
                    <table id="data-table-job-details" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Details of Work</th>
                                <th>Net</th>
                                <th>VC</th>
                                <th>Analysis</th>
                                <th>Discount</th>
                                <th>VAT</th>
                                <th>Gross</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="job-details-body" orderid="{{$order->id}}">
                            @if(count($jobDetails) > 0)
                                @foreach($jobDetails as $jobDetail)
                                    <tr class="job-details-row job-details-row-{{$jobDetail->id}}">
                                        <td class="">{{$loop->index + 1 }}</td>
                                        <td class="details_of_work">{{$jobDetail->details_of_work}}</td>
                                        <td class="net">{{$jobDetail->net}}</td>
                                        <td class="vat_code_id" id="{{$jobDetail->vat_code_id}}">{{$jobDetail->vatCode->vat_description}}</td>
                                        <td class="analysis_id" id="{{$jobDetail->analysis_id}}">{{$jobDetail->analysis->description}}</td>
                                        <td class="discount">{{$jobDetail->discount}}</td>
                                        <td class="vat">{{$jobDetail->vat}}</td>
                                        <td class="gross">{{$jobDetail->gross}}</td>
                                        <td class="popover-cl-pro">
                                            <button class="btn btn-primary edit-job-detail" data-trigger="hover" 
                                                    data-toggle="popover" data-placement="bottom" 
                                                    data-content="Edit" jobdetailid="{{$jobDetail->id}}">
                                                    <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="no-record-found">
                                    <td colspan="9" class="text-center">No record found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		
    </div>
@endsection



@section('page-scripts')
    <script src="{{ asset('js/tabs/job-details.js') }}"></script>
@endsection