const SYSTEM_URL = $("body").attr("url");

$(document).ready(function(){
    $('#data-table-sage-report').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [
            { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate' },
            { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
            { extend: 'excel', className: 'btn btn-primary glyphicon glyphicon-list-alt' },
            { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
            { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print' }
        ]
     });
});