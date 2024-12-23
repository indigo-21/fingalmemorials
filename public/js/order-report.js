const SYSTEM_URL = $("body").attr("url");
$(document).ready(function() {
    $('#data-table-order-report').DataTable({
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
    $(document).on('click', '#searchOrder', function() {
        let startDate = $('input[name="order_date_start"]').val();
        let endDate = $('input[name="order_date_end"]').val();

        $.ajax({
            type:  'POST',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {startDate, endDate},
            url: `${SYSTEM_URL}/order-report/search`,
            beforeSend: function() {
                let tableRow = `
                <tr>
                    <td  colspan="8"><div class="loader"></div></td>
                    
                </tr>
                `;
                $("#orderReportData").html(tableRow);
            },
            success: function(data) {
                let tableRow = `
                <tr>
                    <td  colspan="8">No Data Found.</td>
                    
                </tr>
                `;  
                data.map((orderData, index) => {
                    let splitDate   = orderData.order_date.split("-");
                    tableRow += `
                    <tr>
                        <td>${orderData.id}</td>
                        <td>${splitDate[2]}/${splitDate[1]}/${splitDate[0]}</td>
                        <td>${orderData.branch_name}</td>
                        <td>${orderData.order_type_name}</td>
                        <td>${orderData.order_headline}</td>
                        <td>${orderData.customer_name}</td>
                        <td>${orderData.value || "0"}</td>
                        <td>${orderData.balance || "0"}</td>
                    </tr>`;
                })
               
                $("#orderReportData").html(tableRow);
            }
        })
    });
});