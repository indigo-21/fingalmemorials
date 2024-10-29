$(document).ready(function(){
    $('#data-table-basic').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
     });
    const  SYSTEM_URL   = $("body").attr("url");

    $(document).on("change","[name=search_field]", function(){
        
        let isValid = $("[name=search_field]").find(":selected").val() != "";
        $("[name=search_input]").val("");
        $("[name=search_input]").attr("disabled", !isValid);

    });


    $(document).on("click","#search-order", function(){
        let order_type      =   $("[name=order_type_id]").find(":selected").val();
        let order_month     =   $("[name=order_month]").find(":selected").val();
        let order_year      =   $("[name=order_year]").find(":selected").val();
        let branch          =   $("[name=branch]").find(":selected").val();
        let invoice_status  =   $("[name=invoice_status]").find(":selected").val();
        let search_field    =   $("[name=search_field]").find(":selected").val();
        let search_input    =   $("[name=search_input]").val();

        let data            = {order_month,order_year,order_type,branch,invoice_status};
        
        if(search_field != "" && search_input != ""){
            data["search_field"] = search_field;
            data["search_input"] = search_input;
        }

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data,
            url: "/order/searchOrder",
            beforeSend:function(){

            },
            success:function(data){
              
                let order_status    = ``;
                let table_row       = data.length === 0 ?`
                                        <tr style="border-bottom: 1px solid rgba(0, 0, 0, 0.3);">
                                            <td colspan="8" class="text-center">No data available in table</td>
                                        <tr>
                                        ` : "";
                data.map((data, index)=>{

                                if(data.status_id == "1"){
                                    order_status =  `<div class="open-order">
                                                        Open Order
                                                    </div> ` ;
                                }else if(data.status_id == "2"){
                                    order_status =  `<div class="invoiced">
                                                        Invoiced - No Editing
                                                    </div>`;  
                                }else if(data.status_id == "3"){
                                    order_status =  `<div class="order-cancelled">
                                                        Order Cancelled
                                                    </div>`
                                }else{
                                    order_status = `<div class="complete-order">
                                                        Order Complete
                                                    </div>`;
                                }

                                table_row       += `
                                                        <tr>
                                                            <td style="font-size:90%;text-align:center;"><a href="${SYSTEM_URL}/order/edit/general-details/${data.id}">${data.id}</a></td>
                                                            <td style="font-size:90%;">${data.order_date_format}</td>
                                                            <td style="font-size:90%;">${data.branch_name}</td>
                                                            <td style="font-size:90%;">${data.order_type}</td>
                                                            <td style="font-size:90%;">${data.customer_firstname} ${data.customer_middlename || ""} ${data.customer_surname}</td>
                                                            <td style="font-size:90%;">${data.deceased_name || ""}</td>
                                                            <td style="font-size:90%;">${data.cemetery_name || "-"}</td>
                                                            <td style="font-size:90%;">${order_status}</td>
                                                            <td class="popover-cl-pro" style="font-size:90%;">
                                                                <a href="${SYSTEM_URL}/order/edit/general-details/${data.id}" class="btn btn-primary" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="Edit"><i class="fa fa-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        `;
                });

                $("#order_table_row").html(table_row);
            },
            error:function(error){
                console.log(error);
            }
        });
    });


});