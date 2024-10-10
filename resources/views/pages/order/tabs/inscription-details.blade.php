@extends ('pages.order.form')
@section('tab-inscription-details')
<style>
    .note-editable{
        height: 650px !important;
    }

</style>
<div>
    <div class="row mt-50">
        <h3 class="title text-center">Inscription Details</h3>
        <div class="html-editor" id="inscription_details" orderid="{{$order->id}}"></div>
    </div>
    <div class="row mt-20">
        <div class="col-md-12 text-center">
            <div class="form-btn">
                <button class="btn btn-light btn-icon-notika waves-effect">Cancel</button>
                <button class="btn btn-primary btn-icon-notika waves-effect inscription-button add-inscription-details" orderid="{{$order->id}}" type="button">Create</button>
            </div>
        </div>
    </div>
</div>
@endsection



@section('page-scripts')
    <script src="{{ asset('js/tabs/inscription-details.js') }}"></script>
@endsection