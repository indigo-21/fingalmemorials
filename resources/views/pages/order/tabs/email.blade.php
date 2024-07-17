@extends ('pages.order.form')
@section('tab-email')
    <div class="document mt-50 mb-20">
        <div class="row">
            <h3 class="title text-center">Email</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="" enctype="multipart/form-data">
                <div class="nk-int-st mb-20">
                    <label>Email To</label>
                    <input type="text" class="form-control" placeholder="Email To" name="email_to">
                </div>
                <div class="nk-int-st mb-20">
                    <label>Message</label>
                    <textarea class="form-control" placeholder="Message Here" rows="10">
                        Dear Mr. Browne,

                        Please find attached details of your order.

                        If you have any questions, please do not hesitate to contact us.

                        Kind Regards,

                        Fingal Memorials
                    </textarea>
                </div>
                <div class="mb-20">
                    <label>Attachments</label>
                    <div class="form-check email-tab-checkbox">
                        <span>
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Order</label>
                        </span>
                        <span>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Inscription
                            </label>
                        </span>
                        <span>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Invoice
                            </label>
                        </span>
                        <span>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Receipt
                            </label>
                        </span>
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
                            <button class="btn btn-primary btn-icon-notika waves-effect add-document"
                                orderid="{{ $order->id }}" type="button">Create</button>
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
                                <th>Email Body</th>
                                <th>Email By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $document->documentType->name }}</td>
                                    <td>{{ $document->description }}</td>
                                    <td><a href="{{ url('documents/' . $document->filename) }}"
                                            target="_blank">{{ $document->filename }}</a></td>
                                    <td>{{ $document->user->firstname }} {{ $document->user->lastname }}</td>
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
