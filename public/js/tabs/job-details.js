// INITIAL LOAD OF THE PAGE FUNCTION
$(document).ready(function() {
    const  SYSTEM_URL = $("body").attr("url"); 
    $('#data-table-basic').DataTable();

    function getJobDetails(order_id){
        let data = {
            order_id:          order_id,
            details_of_work:   $("[name=details_of_work]").val(),
            analysis_id:       $("[name=analysis_id]").find(":selected").val(),
            vat_code_id:       $("[name=vat_code_id]").find(":selected").val(),
            vat:               $("[name=vat]").val(),
            net:               $("[name=net]").val(),
            discount:          $("[name=discount]").val(),
            gross:             $("[name=gross]").val(),
    
        }
        return data;
        
    }
    
    // Related on JOB DETAILS
    $(document).on("click", ".add-job-detail",function(){
        // Get Form Data
        let order_id      = $(this).attr("orderid");
        let data          = getJobDetails(order_id);
        let rowCount      = $(".job-details-row").length;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `${SYSTEM_URL}/order/create/modifyJobDetails`,
            type: "POST",
            data,
            beforeSend:function(){
                $(".no-record-found").hide(500, function(){
                    $(".no-record-found").remove();
                });
            },
            success:function(data){
                console.log(data);
                let jobDetailRow  = `
                                    <tr class="job-details-row">
                                            <td>${rowCount + 1}</td>
                                            <td>${data.details_of_work}</td>
                                            <td>${data.net}</td>
                                            <td>${data.vat_code_id}</td>
                                            <td>${data.analysis_id}</td>
                                            <td>${data.discount}</td>
                                            <td>${data.vat}</td>
                                            <td>${data.gross}</td>
                                            <td class="popover-cl-pro">
                                                <button class="btn btn-primary edit-job-detail" data-trigger="hover" 
                                                        data-toggle="popover" data-placement="bottom" 
                                                        data-content="Edit" jobdetailid="${data.job_detail_id}">
                                                        <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>`;
                $(".job-details-body").append(jobDetailRow);
            },
            error:function(error){

            }
        });
        
        
        
    }); 



});







