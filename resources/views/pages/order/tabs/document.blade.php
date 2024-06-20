@extends ('pages.order.form')
@section('tab-document')
    <div class="document mt-50 mb-20">
        <div class="row">
            <h3 class="title text-center">Document</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <form action="" enctype="multipart/form-data">
                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Document Type:</label>
                    <select class="selectpicker" name="document_type_id">
                        <option selected disabled value="">- Document Type</option>
                        @foreach ($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="nk-int-st mb-20">
                    <label>Description</label>
                    <input type="text" class="form-control" placeholder="Headline" name="document_description">
                </div>
                <div class="nk-int-st mb-20">
                    <label>Document</label>
                    <input type="file" class="form-control" placeholder="Headline" name="file">
                </div>
                <div class="row mt-20">
                    <div class="col-md-12 text-right">
                        <div class="form-btn">
                            <button class="btn btn-light btn-icon-notika waves-effect" type="button">Cancel</button>
                            <button class="btn btn-primary btn-icon-notika waves-effect add-document"
                                orderid="{{ $order->id }}" type="button">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="data-table-list">
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Document Type</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Created by</th>
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
    <script src="{{ asset('js/tabs/document.js') }}"></script>
@endsection
