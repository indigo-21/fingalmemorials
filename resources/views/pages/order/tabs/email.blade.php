@extends ('pages.order.form')
@section('tab-email')
    <div class="document mt-50 mb-20">
        <div class="row">
            <h3 class="title text-center">Email</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="" enctype="multipart/form-data" class="email-form" orderid="{{ $order->id }}">
                <div class="nk-int-st mb-20">
                    <label>Email To</label>
                    <input type="text" class="form-control" placeholder="Email To" value="{{$customer->email}}" disabled name="email_to">
                </div>
                <div class="nk-int-st mb-20">
                    <label>Message</label>
                    <textarea class="form-control" placeholder="Message Here" rows="5" name="email_message">
                        Please find attached details of your order.
                        
                        If you have any questions, please do not hesitate to contact us.
                    </textarea>
                </div>
                <div class="mb-20">
                    <label>Attachments</label>
                    <div class="form-check email-tab-checkbox">
                        <span>
                            <input type="checkbox" class="form-check-input" value="" name="order_details">
                            <label class="form-check-label">Order</label>
                        </span>

                        @if($hasInscription)

                        <!-- <span>
                            <input class="form-check-input" type="checkbox" value="" name="order_inscription" >
                            <label class="form-check-label">
                                Inscription
                            </label>
                        </span> -->

                        @endif

                        @if($hasInvoice)
                            <span>
                                <input class="form-check-input" type="checkbox" value="" name="order_invoice" >
                                <label class="form-check-label">
                                    Invoice
                                </label>
                            </span>
                        @endif

                        @if($hasReceipt)
                            <span>
                                <input class="form-check-input" type="checkbox" value="" name="order_receipt" >
                                <label class="form-check-label">
                                    Receipt
                                </label>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="nk-int-st mb-20">
                    <label>Attachment</label>
                    <input type="file" class="form-control" placeholder="Headline" name="file">
                </div>
                <div class="row mb-20">
                    <div class="col-md-12 text-center">
                        <div class="form-btn">
                            <button class="btn btn-light btn-icon-notika waves-effect" type="button">Cancel</button>
                            <button class="btn btn-primary btn-icon-notika waves-effect send-email"
                                type="button">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr style="width:90%;margin:auto;">
    <div class="row mt-50">
        <h3 class="title text-center">Emails Sent</h3>
        <div class="col-lg-12 col-md-12">
            <div class="data-table-list">
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email Date</th>
                                <th>Email To</th>
                                <!-- <th>Email Body</th> -->
                                <th>Email By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attachments as $attachment)
                                <tr>
                                    <td>{{ $attachment->created_at->format("d/m/Y") }}</td>
                                    <td>{{ $attachment->email_to }}</td>
                                    <!-- <td>{{ $attachment->description }}</td> -->
                                    <td>{{ $attachment->user->firstname }} {{ $attachment->user->lastname }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{ asset('js/tabs/email.js') }}"></script>
@endsection
