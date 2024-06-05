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
    
    // EVENT FOR ADDING DATA 
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
                Swal.fire({
                    icon: "success",
                    title: "New Job Detail Added",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){

                    let jobDetailRow  = `
                                    <tr class="job-details-row job-details-row-${data.job_detail_id}">
                                            <td>${rowCount + 1}</td>
                                            <td class="details_of_work">${data.details_of_work}</td>
                                            <td class="net">${data.net}</td>
                                            <td class="vat_code_id" id="${data.vat_code_id}">${data.vat_code_description}</td>
                                            <td class="analysis_id" id="${data.analysis_id}">${data.analysis_description}</td>
                                            <td class="discount">${data.discount}</td>
                                            <td class="vat">${data.vat}</td>
                                            <td class="gross">${data.gross}</td>
                                            <td class="popover-cl-pro">
                                                <button class="btn btn-primary edit-job-detail" data-trigger="hover" 
                                                        data-toggle="popover" data-placement="bottom" 
                                                        data-content="Edit" jobdetailid="${data.job_detail_id}">
                                                        <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>`;
                    $(".job-details-body").append(jobDetailRow);
    
                });
            },
            error:function(error){

            }
        });
        
        
        
    }); 

    // EVENT FOR UPDATING DATA
    $(document).on("click", ".update-job-detail", function(){
        let order_id            = $(this).attr("orderid");
        let job_detail_id       = $(this).attr("jobdetailid");
        let data                = getJobDetails(order_id);
        data["job_detail_id"]   = job_detail_id;
        let element_data        = $(`.job-details-row-${job_detail_id}`);

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
                Swal.fire({
                    icon: "success",
                    title: "Job Details Updated",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    element_data.find(".details_of_work").text(data.details_of_work);
                    element_data.find(".analysis_id").attr("id", data.analysis_id);
                    element_data.find(".analysis_id").text(data.analysis_description);
                    element_data.find(".vat_code_id").attr("id", data.vat_code_id);
                    element_data.find(".vat_code_id").text(data.vat_code_description);
                    element_data.find(".vat").text(data.vat);
                    element_data.find(".net").text(data.net);
                    element_data.find(".discount").text(data.discount);
                    element_data.find(".gross").text(data.gross);
                    
                    alterForm();
                    alterButton();
                });
            },
            error:function(error){

            }
        });
    }); 

    // BUTTONS ACTIONS
    $(document).on("click", ".edit-job-detail",function(){
        // Get Form Data
        let job_detail_id   = $(this).attr("jobdetailid");
        alterForm($(this));
        alterButton(job_detail_id);
    }); 

    $(document).on("click",".edit-cancel", function(){
        alterForm();
        alterButton();
    });

    // FUNCTIONS FOR BUTTONS ACTIONS
    function alterForm(element_data = false){

        

        let details_of_work = !element_data ?  "" : element_data.closest(".job-details-row").find(".details_of_work").text();
        let analysis_id     = !element_data ?  "" : element_data.closest(".job-details-row").find(".analysis_id").attr("id");
        let vat_code_id     = !element_data ?  "" : element_data.closest(".job-details-row").find(".vat_code_id").attr("id");
        let vat             = !element_data ?  "" : element_data.closest(".job-details-row").find(".vat").text();
        let net             = !element_data ?  "" : element_data.closest(".job-details-row").find(".net").text();
        let discount        = !element_data ?  "" : element_data.closest(".job-details-row").find(".discount").text();
        let gross           = !element_data ?  "" : element_data.closest(".job-details-row").find(".gross").text();

        $("[name=details_of_work]").val(details_of_work);
        $("[name=analysis_id]").val(analysis_id).trigger("change");
        $("[name=vat_code_id]").val(vat_code_id).trigger("change");
        $("[name=vat]").val(vat);
        $("[name=net]").val(net);
        $("[name=discount]").val(discount);
        $("[name=gross]").val(gross);
    }
    
    function alterButton(job_detail_id = false){
        let order_id        = $(".job-details-body").attr("orderid");
        let html            = `<div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect edit-cancel" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect add-job-detail" type="button" orderid="${order_id}">Add</button>
                                </div>`;

        if(job_detail_id){
            html            = `<div class="form-btn">
                                    <button class="btn btn-light btn-icon-notika waves-effect edit-cancel" type="button">Cancel</button>
                                    <button class="btn btn-primary btn-icon-notika waves-effect update-job-detail" type="button" orderid="${order_id}" jobdetailid="${job_detail_id}">Update</button>
                                </div>`;
        }

        $("#job_details_buttons").html(html);
    }


});







