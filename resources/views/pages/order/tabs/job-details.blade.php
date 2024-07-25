@extends ('pages.order.form')
@section('tab-job-details')
    <div class="job-details mt-50 mb-20">
        <h3 class="title text-center">Job Details</h3>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="GET">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                            <label>Analysis:</label>
                            <select class="selectpicker" name="analysis_id" data-live-search="true">
                                <option selected disabled value="">- Analysis</option>
                                @foreach ($analyses as $analysis)
                                    <option class="option-analysis" value="{{ $analysis->id }}">{{ $analysis->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Details of work</label>
                            <textarea class="form-control" placeholder="Details of work" name="details_of_work" rows="4"></textarea>
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Headstone Shape</label>
                            <input type="text" class="form-control" placeholder="Headstone Shape" name="headstone_shape">
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Chipping Colour</label>
                            <input type="text" class="form-control" placeholder="Chipping Color" name="chipping_color">
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Job Cost</label>
                            <input type="number" class="form-control" placeholder="0.00" name="job_cost"  min="1">
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Total</label>
                            <input type="number" class="form-control" placeholder="0.00" name="total" disabled>
                        </div>
                        <div class="nk-int-st mb-20">
                            <label>Additional Fee</label>
                            <input type="number" class="form-control" placeholder="0.00" name="additional_fee" min="0">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="vat-analysis">
                            <h4 class="title-header title-header-md">VAT Analysis</h4>
                            <div class="nk-int-st mb-20">
                                <label>Net Amount</label>
                                <input type="number" class="form-control" placeholder="0.00" name="net_amount" min="1" disabled>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                                <label>VAT Rate:</label>
                                <select class="selectpicker" name="vat_code_id" data-live-search="true">
                                    <option disabled selected vatrate="" >-- SELECT VAT RATE --</option>
                                    @foreach ($vatCodes as $vatCode)
                                        <option value="{{ $vatCode->id }}" vatrate="{{ $vatCode->vat }}">{{ $vatCode->vat_description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="nk-int-st mb-20">
                                <label>VAT Amount</label>
                                <input type="number" class="form-control" placeholder="0.00" name="vat_amount" disabled id="vat">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="nk-int-st mb-20">
                                        <label>Zero Rated Fees</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="0.00" disabled
                                            name="zero_rated_fees" >
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="nk-int-st mb-20">
                                        <label>Adjusment</label>
                                        <input type="number" class="form-control" placeholder="0.00" min="0.00"
                                            name="adjusment">
                                    </div>
                                </div>
                            </div>
                            <div class="nk-int-st mb-20">
                                <label>Gross</label>
                                <input type="number" class="form-control" placeholder="0.00" name="gross_amount" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-md-12" id="job_details_buttons">
                        <div class="form-btn">
                            <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                            <button class="btn btn-primary btn-icon-notika waves-effect add-job-detail"
                                type="button" orderid="{{ $order->id }}">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr style="width:90%;margin:auto;">
    <div class="row mt-50">
        <h3 class="title text-center">List of Jobs</h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-list">
                <div class="table-responsive">
                    <table id="data-table-job-details" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Details of Work</th>
                                <th>Net Amount</th>
                                <th>VAT Rate</th>
                                <th>Analysis</th>
                                <th>VAT Amount</th>
                                <th>Gross</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="job-details-body" orderid="{{ $order->id }}">
                            @if (count($jobDetails) > 0)
                                @foreach ($jobDetails as $jobDetail)
                                    <tr class="job-details-row job-details-row-{{ $jobDetail->id }}">
                                        <td class="">{{ $loop->index + 1 }}</td>
                                        <td class="details_of_work">{{ $jobDetail->details_of_work }}</td>
                                        <td class="net">{{ $jobDetail->net_amount }}</td>
                                        <td class="vat_code_id" id="{{ $jobDetail->vat_code_id }}">
                                            {{ $jobDetail->vatCode->vat_description }}</td>
                                        <td class="analysis_id" id="{{ $jobDetail->analysis_id }}">
                                            {{ $jobDetail->analysis->description }}</td>
                                        <td class="vat">{{ $jobDetail->vat_amount }}</td>
                                        <td class="gross">{{ $jobDetail->gross_amount }}</td>
                                        <td class="popover-cl-pro">
                                            <button class="btn btn-primary edit-job-detail" data-trigger="hover"
                                                data-toggle="popover" data-placement="bottom" data-content="Edit"
                                                headstoneshape="{{$jobDetail->headstone_shape}}"
                                                chippingcolor="{{$jobDetail->chipping_color}}"
                                                jobcost="{{$jobDetail->job_cost}}"
                                                discount="{{$jobDetail->discount == '' ? '0.00' : $jobDetail->discount }}"
                                                subtotal="{{$jobDetail->total}}"
                                                additionalfee="{{$jobDetail->additional_fee}}"
                                                netamount="{{$jobDetail->net_amount}}"
                                                vatamount="{{$jobDetail->vat_amount}}"
                                                zerorated="{{$jobDetail->zero_rated_amount}}"
                                                adjusment="{{$jobDetail->adjusment_amount}}"
                                                gross="{{$jobDetail->gross_amount}}"
                                                jobdetailid="{{ $jobDetail->id }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td colspan="2" style="text-align:right"><h4>TOTAL GROSS:</h4></td>
                                <td colspan="2">{{number_format($jobValue, 2)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection



@section('page-scripts')
    <script src="{{ asset('js/tabs/job-details.js') }}"></script>
@endsection
