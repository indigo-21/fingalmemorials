@extends('pages.order.form')
@section('tab-print-history')
    <h3 class="title text-center mt-50">Print History</h3>
    <div class="data-table-area">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Type</th>
                                    <th>Filename</th>
                                    <th>Printed By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($printHistories as $printHistory)
                                    <tr>
                                        <td id="tr {{ $printHistory->id }}">{{ $loop->iteration }}</td>
                                        <td>{{ $printHistory->type }}</td>
                                        <td><a href="{{ $printHistory->filename }}/true" target="_blank" rel="noopener noreferrer">{{ $printHistory->type }}</a></td>
                                        <td>{{ $printHistory->user->firstname }} {{ $printHistory->user->lastname }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection

@section('page-scripts')
    <script src="{{ asset('js/delete-script.js') }}"></script>
@endsection
