const  SYSTEM_URL   = $("body").attr("url"); 
const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

// INITIAL LOAD OF THE PAGE FUNCTION
$(document).ready(function() {

    $('#data-table-job-details').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
     });

    

    if(HAS_INVOICE){
        $("#job-details").find("input").attr("disabled", true);
        $("#job-details").find("textarea").attr("disabled", true);
        $("#job-details").find("select").attr("disabled", true);
       
        $("#job_details_buttons").remove();
    }

    // $('#data-table-basic').DataTable();

    function getJobDetails(order_id){
        let data = {
            order_id:          order_id,
            analysis_id:       $("[name=analysis_id]").find(":selected").val(),
            details_of_work:   $("[name=details_of_work]").val(),
            headstone_shape:   $("[name=headstone_shape]").val(),
            chipping_color:    $("[name=chipping_color]").val(),
            job_cost:          $("[name=job_cost]").val(),
            discount:          $("[name=discount]").val(),
            total:             $("[name=total]").val(),
            additional_fee:    $("[name=additional_fee]").val(),
            net_amount:        $("[name=net_amount]").val(),
            vat_code_id:       $("[name=vat_code_id]").find(":selected").val(),
            vat_amount:        $("[name=vat_amount]").val(),
            zero_rated_amount: $("[name=zero_rated_fees]").val(),
            adjusment_amount:  $("[name=adjusment]").val(),
            gross_amount:      $("[name=gross_amount]").val()
        }
        return data;
        
    }
    
    // EVENT FOR ADDING DATA 
    $(document).on("click", ".add-job-detail",function(){
   
        modifyJobDetails($(this));
    
    }); 

    // EVENT FOR UPDATING DATA
    $(document).on("click", ".update-job-detail", function(){

        modifyJobDetails($(this));
        
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

    $(document).on("keyup","[name=job_cost],[name=discount], [name=additional_fee],[name=adjusment]",function(){
        computeJobDetails();
    });

    $(document).on("change","[name=vat_code_id]", function(){
        computeJobDetails();
    });



    // AJAX FUNCTION

    function modifyJobDetails(thisData){
        let order_id            = thisData.attr("orderid");
        let data                = getJobDetails(order_id);
        let job_detail_id       = thisData.attr("jobdetailid");
        data["job_detail_id"]   = job_detail_id;
        let title               = job_detail_id ? "Job Details Updated" : "New Job Detail Added";
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `${SYSTEM_URL}/order/create/modifyJobDetails`,
            type: "POST",
            data,
            beforeSend:function(){
                let tableRow = `
                <tr>
                    <td  colspan="8"><div class="loader"></div></td>
                </tr>`;
                $(".job-details-body").html(tableRow);
            },
            success:function(data){
                Swal.fire({
                    icon: "success",
                    title,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location.href = `${SYSTEM_URL}/order/edit/job-details/${order_id}`;
                    alterForm();
                    alterButton();
                });
            },
            error:function(error){
                errorMessage(error);
            }
        });
    }

    // FUNCTIONS FOR BUTTONS ACTIONS
    function alterForm(element_data = false){

        

        let details_of_work = !element_data ?  "" : element_data.closest(".job-details-row").find(".details_of_work").text();
        let headstone_shape = !element_data ?  "" : element_data.attr("headstoneshape");
        let chipping_color  = !element_data ?  "" : element_data.attr("chippingcolor");
        
        
        
        let analysis_id     = !element_data ?  "" : element_data.closest(".job-details-row").find(".analysis_id").attr("id");
        let vat_code_id     = !element_data ?  "" : element_data.closest(".job-details-row").find(".vat_code_id").attr("id");
        
        let job_cost        = !element_data ?  "" : element_data.attr("jobcost");
        let discount        = !element_data ?  "" : element_data.attr("discount");
        let sub_total       = !element_data ?  "" : element_data.attr("subtotal");
        let additional_fee  = !element_data ?  "" : element_data.attr("additionalfee");
        let net_amount      = !element_data ?  "" : element_data.attr("netamount");
        let vat_amount      = !element_data ?  "" : element_data.attr("vatamount");
        let zero_rated      = !element_data ?  "" : element_data.attr("zerorated");
        let adjusment       = !element_data ?  "" : element_data.attr("adjusment");
        let gross_amount    = !element_data ?  "" : element_data.attr("gross");
        
        
        
        
        let vat             = !element_data ?  "" : element_data.closest(".job-details-row").find(".vat").text();
        let net             = !element_data ?  "" : element_data.closest(".job-details-row").find(".net").text();
       let gross           = !element_data ?  "" : element_data.closest(".job-details-row").find(".gross").text();

        $("[name=details_of_work]").val(details_of_work);
        $("[name=headstone_shape]").val(headstone_shape);
        $("[name=chipping_color]").val(chipping_color);
        $("[name=analysis_id]").val(analysis_id).trigger("change");
        $("[name=vat_code_id]").val(vat_code_id).trigger("change");

        $("[name=job_cost]").val(job_cost);
        $("[name=discount]").val(discount);
        $("[name=total]").val(sub_total);
        $("[name=additional_fee]").val(additional_fee);
        $("[name=net_amount]").val(net_amount);
        $("[name=vat_amount]").val(vat_amount);
        $("[name=zero_rated_fees]").val(zero_rated);
        $("[name=adjusment]").val(adjusment);
        $("[name=gross_amount]").val(gross_amount);



       
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

    function computeJobDetails(){
        
        let job_cost    = parseFloat($("[name=job_cost]").val() != "" ? $("[name=job_cost]").val() : "0").toFixed(2);
        // let discount    = parseFloat($("[name=discount]").val() != "" ? $("[name=discount]").val() : "0").toFixed(2);
        let discount    = 0;
        let sub_total   = job_cost - discount;
        let vat_rate    = parseFloat($("[name=vat_code_id]").find(":selected").attr("vatrate"));
        $("[name=total]").val(sub_total.toFixed(2));

        let net_amount  = (sub_total) * 100 / (100 + vat_rate);
        $("[name=net_amount]").val(net_amount.toFixed(2));

        let vat_amount  = net_amount * (vat_rate/100);
        $("[name=vat_amount]").val(vat_amount.toFixed(2));


        let additional_fee  = parseFloat($("[name=additional_fee]").val() != "" ? $("[name=additional_fee]").val() : "0").toFixed(2);
        let adjusment       = parseFloat($("[name=adjusment]").val() != "" ? $("[name=adjusment]").val() : "0").toFixed(2);
        $("[name=zero_rated_fees]").val(additional_fee);

        let gross_amount    = (parseFloat(additional_fee) + parseFloat(adjusment) ) + (vat_amount + net_amount);

        $("[name=gross_amount]").val(gross_amount.toFixed(2));

    }


    function errorMessage(error){
        let errorArray  = error.responseJSON.errors;
        let errorList   = "";
    
        $.each(errorArray, function(key, value){
            errorList += `<li> <strong>- </strong>${value[0]}</li>`;
        });
        
        let html = `<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                        </button> 
                        <ul>
                            ${errorList}
                        </ul>
                    </div>  `;
    
        $("#error_container").html(html);
    
        // Scroll to the error messages container
        document.getElementById('error_container').scrollIntoView({
            behavior: 'smooth'
        });
    }


});







