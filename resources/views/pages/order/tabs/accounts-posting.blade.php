@extends ('pages.order.form')
@section('tab-accounts-posting')
    <div>
        <div class="row mt-40 mb-40">
            <h3 class="title text-center">Accounts Posting</h3>
            <div class="col-12 col-md-4">
                <div class="chosen-select-act fm-cmp-mg mb-40">
                    <label>Type</label>
                    <select class="chosen" data-placeholder="Choose a Country...">
                        <option value="United States">Payments</option>
                        <option value="United Kingdom">Refunds</option>
                        <option value="Afghanistan">Invoices</option>
                        <option value="Aland Islands">Credits</option>
                        <option value="Aland Islands">Additional</option>
                    </select>
                </div>
                <div id="type-payment">
                    <h4 class="title-header title-header-md">Payment Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date Payment Received</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="03/19/2018">
                        </div>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg mb-20">
                        <label>Payment Type</label>
                        <select class="chosen" data-placeholder="Choose a Country...">
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Reason</label>
                        <input type="text" class="form-control" placeholder="Reason">
                    </div>
                    <div class="nk-int-st" style="margin-bottom:20px;">
                        <label>Payment</label>
                        <input type="text" class="form-control" placeholder="Payment">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                                <button class="btn btn-primary btn-icon-notika waves-effect">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="type-refund">
                    <h4 class="title-header title-header-md">Refund Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date of Refund</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="03/19/2018">
                        </div>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg mb-20">
                        <label>Payment Type</label>
                        <select class="chosen" data-placeholder="Choose a Country...">
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Reason</label>
                        <input type="text" class="form-control" placeholder="Reason">
                    </div>
                    <div class="nk-int-st" style="margin-bottom:20px;">
                        <label>Payment</label>
                        <input type="text" class="form-control" placeholder="Payment">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                                <button class="btn btn-primary btn-icon-notika waves-effect">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="type-invoice">
                    <h4 class="title-header title-header-md">Invoice Details</h4>
                    <div class="nk-datapk-ctm form-elet-mg bv-20" id="data_1" style="margin-bottom:20px;">
                        <label>Date of the Invoice</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" value="03/19/2018">
                        </div>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Invoice to</label>
                        <input type="text" class="form-control" placeholder="Reason">
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 text-center">
                            <div class="form-btn">
                                <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                                <button class="btn btn-primary btn-icon-notika waves-effect">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Inv No.</th>
                                    <th>Details</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Renovation</td>
                                    <td>234.43</td>
                                    <td>T1</td>
                                    <td>Renovation</td>
                                    <td>0</td>
                                    <td class="popover-cl-pro">
                                        <button class="btn btn-primary" data-trigger="hover" data-toggle="popover"
                                            data-placement="bottom" data-content="Edit"><i
                                                class="fa fa-pencil"></i></button>
                                        <button class="btn btn-primary" data-trigger="hover" data-toggle="popover"
                                            data-placement="bottom" data-content="Print"><i
                                                class="fa fa-print"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
