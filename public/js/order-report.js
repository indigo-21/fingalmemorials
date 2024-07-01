const SYSTEM_URL = $("body").attr("url");
$(document).ready(function() {
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
                    tableRow = `
                    <tr>
                        <td>${orderData.id}</td>
                        <td>${orderData.order_date}</td>
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