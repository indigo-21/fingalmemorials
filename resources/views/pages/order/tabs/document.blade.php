@extends ('pages.order.form')
@section('tab-document')
    <div class="document-field mt-40 mb-40">
        <div class="row">
            <h3 class="title text-center">Document</h3>
            <div class="col-12 col-md-6">
                <div class="bootstrap-select fm-cmp-mg" style="margin-bottom:20px;">
                    <label>Document Type:</label>
                    <select class="selectpicker">
                        <option>Monumental</option>
                        <option>Cariska</option>
                        <option>Cheriska</option>
                        <option>Malias</option>
                        <option>Kamines</option>
                        <option>Austranas</option>
                    </select>
                </div>
                <div class="nk-int-st mb-20">
                    <label>Description</label>
                    <input type="text" class="form-control" placeholder="Headline">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="nk-int-st mb-20">
                    <label>Document</label>
                    <input type="file" class="form-control" placeholder="Headline">
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-12 text-right">
                <div class="form-btn">
                    <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                    <button class="btn btn-primary btn-icon-notika waves-effect">Create</button>
                </div>
            </div>
        </div>
    </div>
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
                            <tr>
                                <td>1</td>
                                <td>Renovation</td>
                                <td>234.43</td>
                                <td>T1</td>
                                <td>Renovation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
