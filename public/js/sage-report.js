const SYSTEM_URL = $("body").attr("url");

$(document).ready(function(){
    let sageTable = "";
    initDataTables();

     $(document).on("click", "#searchSage", function(){
        let sage_date_start  = $("[name=sage_date_start]").val();
        let sage_date_end    = $("[name=sage_date_end]").val();
        
        // getTableData(sage_date_start, sage_date_start);
        
        if(sage_date_start || sage_date_end){
            let start_dates = sage_date_start.split("/");
            let end_dates   = sage_date_end.split("/");
            let start_date  = `${start_dates[1]}/${start_dates[0]}/${start_dates[2]}`;
            let end_date    = `${end_dates[1]}/${end_dates[0]}/${end_dates[2]}`;
            getTableData(start_date, end_date);
        }

     });

     function getTableData(startDate, endDate){
        // $.ajax({
        //     type: "POST",
        //     method: "POST",
        //     headers:{
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     data:{startDate,endDate},
        //     url: `${SYSTEM_URL}/sage-report/search`,
        //     beforeSend:function(){
        //         let tableRow = `
        //         <tr>
        //             <td  colspan="9"><div class="loader"></div></td>
                    
        //         </tr>
        //         `;
        //         $("#sageReportData").html(tableRow);
        //     },
        //     success:function(data){
        //         let tableRow = `
        //              <tr>
        //                 <td colspan="9" class="text-center">No data available in table</td>
        //             </tr>
        //             `;
        //         if(data.length > 0){
        //             tableRow = "";
        //             data.map((sageData, index)=>{
        //                 let splitDate   = sageData.account_posting_date.split("-");
        //                 let sage_type = "SI";
        //                 let tax_type  = "T1";

        //                 if(sageData.account_posting_nominal == "1201"){
        //                     sage_type = "SA";
        //                     tax_type  = "T0";
        //                 }else if(sageData.account_posting_nominal == "2112"){
        //                     sage_type = "BR";
        //                     tax_type  = "T9";
        //                 }


        //                 tableRow += `<tr>
        //                                 <td>
        //                                     ${sage_type}
        //                                 </td>
        //                                 <td>${sageData.account_number}</td>
        //                                 <td>${splitDate[2]}/${splitDate[1]}/${splitDate[0]}</td>
        //                                 <td>${sageData.order_id}</td>
        //                                 <td>${sageData.detail}</td>
        //                                 <td>${sageData.detail}</td>
        //                                 <td>${tax_type} </td>
        //                                 <td>${sageData.vat_amount}</td>
        //                                 <td>${sageData.created_by_user}</td>
        //                             </tr>`;
                        
        //             });
        //         }

        //         $("#sageReportData").html(tableRow);
        //         initDataTables();
  
        //     }
        // })

        $.ajax({
            type: "POST",
            url: `${SYSTEM_URL}/sage-report/search`,
            headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:{ startDate, endDate },
            beforeSend:function(){
                sageTable.clear().draw();
                $("#sageReportData").html(`
                    <tr>
                        <td colspan="9" class="text-center">
                            <div class="loader"></div>
                        </td>
                    </tr>
                `);
            },
            success:function(data){
                sageTable.clear(); 
                if(data.length > 0){
                    data.forEach((sageData) => {
                        let splitDate   = sageData.account_posting_date;
                        let dateObj     = new Date(splitDate);
                        let formatted   = dateObj.toLocaleDateString("en-GB"); 
                        let vat_amount  = sageData.vat_amount

                        let sage_type   = "SI", tax_type = "T1";
                        if(sageData.account_posting_nominal == "1201"){ 
                            sage_type = "SA"; tax_type = "T0"; 
                        }else if(sageData.account_posting_nominal == "2112"){ 
                            sage_type = "BR"; tax_type = "T9"; 
                            vat_amount = 0;
                        }
                        
                        sageTable.row.add([
                            sage_type,
                            sageData.account_number,
                            `${formatted}`,
                            sageData.order_id,
                            sageData.detail,
                            numberFormat(sageData.net_amount),
                            tax_type,
                            numberFormat(vat_amount),
                            sageData.created_by_user
                        ]);
                    });
                }
                sageTable.draw();
            }
        });

        
     }

     function initDataTables(){
        
        // $('#data-table-sage-report').DataTable().destroy();

        sageTable = $('#data-table-sage-report').DataTable({
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
     }
});

function numberFormat(numberValue){
    let data = parseFloat(numberValue);
    // return data.toLocaleString("en-US", { style: "currency", currency: "USD" });
    return data.toLocaleString("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 })
}