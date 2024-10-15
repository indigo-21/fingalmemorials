@extends ('pages.order.form')
@section('tab-accounts-posting')
    <div id="account-posting-container" orderid="{{$order->id}}">
        <div class="row mt-40 mb-40">
            <h3 class="title text-center">Accounts Posting</h3>
            <div class="col-12 col-md-12">
                <div class="chosen-select-act fm-cmp-mg mb-40">
                    <label>Type</label>
                    <select class="selectpicker" id="payment_type" name="account_type_id">
                        @foreach($accountTypes as $accountType)
                            <option value="{{$accountType->id}}" code="{{strtolower($accountType->code)}}">{{$accountType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="tab-form-content" id="tab-form-content-1">
                    <h4 class="title-header title-header-md">Payment Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date Payment Received</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="{{date('d/m/Y')}}" name="date_received">
                        </div>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg mb-20">
                        <label>Payment Type</label>
                        <select class="selectpicker payment-type" data-placeholder="Choose a Payment Type..." name="payment_type_id">
                            <option disabled selected value="">- Select Payment Type</option>
                            @foreach($paymentTypes as $paymentType)
                                <option value="{{$paymentType->id}}" 

                                        @if($hasInvoice)
                                            reason="Payment Received by {{$paymentType->name}}"
                                        @else
                                            reason="Deposit paid by {{$paymentType->name}}"
                                        @endif
                                    
                                    >{{$paymentType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Details</label>
                        <input type="text" class="form-control" placeholder="Details" disabled name="reason">
                    </div>
                    <div class="nk-int-st" style="margin-bottom:20px;">
                        <label>Payment</label>
                        <input type="number" class="form-control" placeholder="Payment" name="payment">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="account_posting_buttons">
                                <div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="{{$order->id}}" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-form-content" id="tab-form-content-2" style="display:none;">
                    <h4 class="title-header title-header-md">Refund Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date of Refund</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="{{date('d/m/Y')}}" name="date_received">
                        </div>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg mb-20">
                        <label>Payment Type</label>
                        <select class="selectpicker payment-type" data-placeholder="Choose a Country..." name="payment_type_id">
                            <option disabled selected value="">- Select Payment Type</option>
                            @foreach($paymentTypes as $paymentType)
                                <option value="{{$paymentType->id}}" reason="Refund paid by {{$paymentType->name}}">{{$paymentType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Details</label>
                        <input type="text" class="form-control" placeholder="Reason" disabled name="reason">
                    </div>
                    <div class="nk-int-st" style="margin-bottom:20px;">
                        <label>Refund Amount</label>
                        <input type="number" class="form-control" placeholder="Payment" name="payment">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="account_posting_buttons">
                                <div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="{{$order->id}}" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-form-content" id="tab-form-content-3" style="display:none;">
                    <h4 class="title-header title-header-md">Invoice Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date of the Invoice</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="{{date('d/m/Y')}}" name="date_received">
                        </div>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Invoice To</label>
                        <input type="text" class="form-control" disabled placeholder="Reason" name="invoice_to" value="{{$customer->title->name}} {{$customer->firstname}} {{$customer->middlename}} {{$customer->surname}}">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="account_posting_buttons">
                                <div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="{{$order->id}}" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-form-content" id="tab-form-content-4" style="display:none;">
                    <h4 class="title-header title-header-md">Credits Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date of the Credits</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="{{date('d/m/Y')}}" name="date_received">
                        </div>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Credits To</label>
                        <input type="text" class="form-control" disabled placeholder="Reason" name="invoice_to" value="{{$customer->title->name}} {{$customer->firstname}} {{$customer->middlename}} {{$customer->surname}}">
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Reason</label>
                        <input type="text" class="form-control" placeholder="Reason" name="reason">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="account_posting_buttons">
                                <div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="{{$order->id}}" type="button">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Inv/Cred No.</th>
                                    <th>Details</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accountPostings as $accountPosting)
                                    <tr>
                                        <td>{{$loop->index + 1 }}</td>
                                        <td>
                                            <strong>
                                                @switch($accountPosting->account_type_id)
                                                    @case("1")
                                                        Date Received
                                                    @break
                                                    @case("2")
                                                        Date Refund
                                                    @break    
                                                    @case("3")
                                                        Date Invoice
                                                    @break    
                                                    @case("4")
                                                        Date Credits
                                                    @break    
                                                    @default
                                                @endswitch
                                            </strong>
                                                <br>
                                            {{date('d/m/Y', strtotime($accountPosting->created_at))}}
                                        </td>
                                        <td>{{$accountPosting->account_type->code}}</td>
                                        <td>{{$accountPosting->invoice_number ? $accountPosting->invoice_number : "-"}}</td>
                                        <td>
                                            @if($accountPosting->description)
                                                <span class="reason" reasons="{{$accountPosting->reasons}}"> {{$accountPosting->description}}<span>
                                            @else
                                                <span class="reason" reasons="{{$accountPosting->reasons}}"> Invoice Ord No. {{$accountPosting->order_id}}  <span>
                                            @endif
                                            
                                        </td>
                                        <td>{{number_format($accountPosting->debit, 2)}}</td>
                                        <td>{{number_format($accountPosting->credit,2)}}</td>
                                        <td class="popover-cl-pro">
                                            @if($accountPosting->account_type_id != "3")
                                            <button class="btn btn-primary edit-account-posting" data-trigger="hover" data-toggle="popover"
                                                    orderid="{{$accountPosting->order_id}}" 
                                                    accountpostingid="{{$accountPosting->id}}"
                                                    accounttypeid="{{$accountPosting->account_type_id}}"
                                                    datereceived="{{ date('d/m/Y', strtotime($accountPosting->created_at)) }}"
                                                    paymenttypeid="{{$accountPosting->payment_type_id}}"
                                                    payment="{{$accountPosting->payment}}"
                                            
                                                data-placement="bottom" data-content="Edit"><i
                                                    class="fa fa-pencil"></i></button>
                                            @endif

                                            @if($accountPosting->invoice_number)
                                                <a class="btn btn-primary" target="_blank" href="{{url('/order/invoice/')}}/{{$accountPosting->order_id}}/{{$accountPosting->invoice_number}}" data-trigger="hover" data-toggle="popover"
                                                    data-placement="bottom" data-content="Print"><i
                                                        class="fa fa-print"></i></a>
                                            @else
                                                <a class="btn btn-primary" target="_blank" href="{{url('/order/receipt/')}}/{{$accountPosting->order_id}}/{{$accountPosting->id}}" data-trigger="hover" data-toggle="popover"
                                                data-placement="bottom" data-content="Print"><i
                                                    class="fa fa-print"></i></a>
                                            @endif
                                            
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
@endsection


@section('page-scripts')
    <script src="{{ asset('js/tabs/accounting-posting.js') }}"></script>
@endsection