@extends ('pages.order.form')
@section('tab-document')
    <form action="" enctype="multipart/form-data">
        <div class="document-field mt-40 mb-40">
            <div class="row">
                <h3 class="title text-center">Document</h3>
                <div class="col-12 col-md-6">
                    <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                        <label>Document Type:</label>
                        <select class="selectpicker" name="document_type_id">
                            <option selected disabled>- Document Type</option>
                            @foreach($documentTypes as $documentType)
                                <option value="{{$documentType->id}}">{{$documentType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nk-int-st mb-20">
                        <label>Description</label>
                        <input type="text" class="form-control" placeholder="Headline" name="document_description">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="nk-int-st mb-20">
                        <label>Document</label>
                        <input type="file" class="form-control" placeholder="Headline" name="file">
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12 text-right">
                    <div class="form-btn">
                        <button class="btn btn-light btn-icon-notika waves-effect" type="button">Cancel</button>
                        <button class="btn btn-primary btn-icon-notika waves-effect add-document" orderid="{{$order->id}}" type="button">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                            @foreach($documents as $document)
                                <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>{{$document->documentType->name}}</td>
                                    <td>{{$document->description}}</td>
                                    <td><a href="{{url('documents/'.$document->filename)}}" target="_blank">{{$document->filename}}</a></td>
                                    <td>{{$document->user->firstname}} {{$document->user->lastname}}</td>
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