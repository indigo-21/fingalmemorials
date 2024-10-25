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
    const  SYSTEM_URL = $("body").attr("url");
    

    $(document).on("change", "#payment_type", function(){
        let div_id  =   `tab-form-content-${$(this).val()}`;
        formContentAnimation(div_id);
        changeButtons(div_id);
        // changeButtons(div_id,"insert");
    });

    $(document).on("change",".payment-type", function(){
        let reason  = $(this).find(":selected").attr("reason");
        $(this).closest(".tab-form-content").find("[name=reason]").val(reason);
    });

    $(document).on("click", ".add-account-posting", function(){
        let thisForm            = $(this).closest(".tab-form-content");
        let account_posting_id  = $(this).attr("accountpostingid");
        let order_id            = $(this).attr("orderid");
        let account_type_id     = $("[name=account_type_id]").find(":selected").val();   
        let date_received       = thisForm.find("[name=date_received]").val();   
        let payment_type_id     = thisForm.find("[name=payment_type_id]").find(":selected").val();   
        let reason              = thisForm.find("[name=reason]").val();   
        let payment             = thisForm.find("[name=payment]").val();   
        let invoice_to          = thisForm.find("[name=invoice_to]").val();
        let isInsert            = !account_posting_id ? true : false;
        // IS INVOICE
        if(account_type_id == "3"){
            payment = $("#order-value").val(); 
        }

        let data = {
            order_id,account_posting_id, account_type_id, date_received, payment_type_id,reason,payment,invoice_to
        };
        
        if($("#order-value").val() == "0.00"){
            errorMessage(`<strong>Job Details Not Found.</strong> Please fill out the Job details first.`, true);
        }else{
            modifyAccountPosting(data, isInsert);
        }
        

    });

    $(document).on("click",".edit-account-posting",function(){
        let account_posting_id  = $(this).attr("accountpostingid");
        let account_type_id     = $(this).attr("accounttypeid");
        let div_id              = `tab-form-content-${account_type_id}`;
        let date_received       = $(this).attr("datereceived");
        let payment_type_id     = $(this).attr("paymenttypeid");
        let reason              = $(this).closest("tr").find(".reason").text();
        let payment             = $(this).attr("payment");

        if(account_type_id == 4){
            reason              = $(this).closest("tr").find(".reason").attr("reasons");
        }

            $("[name=account_type_id]").val(account_type_id).trigger("change");   
            $(`#${div_id}`).find("[name=date_received]").val(date_received);   
            $(`#${div_id}`).find("[name=reason]").val(reason);   
            $(`#${div_id}`).find("[name=payment]").val(payment);   
            $(`#${div_id}`).find("[name=payment_type_id]").val(payment_type_id).trigger("change"); 

            changeButtons(div_id, account_posting_id);
        
        // formContentAnimation(div_id);
        
    });

    $(document).on("click",".update-account-posting", function(){

    });

    $(document).on("click",".cancel-account-posting", function(){
        let div_id  = $(this).closest(".tab-form-content").attr("id");
        $(`#${div_id}`).find("[name=date_received]").val("");   
        $(`#${div_id}`).find("[name=reason]").val("");   
        $(`#${div_id}`).find("[name=payment]").val("");   
        $(`#${div_id}`).find("[name=payment_type_id]").val("").trigger("change"); 

        changeButtons(div_id);
    });



    

    function changeButtons(div_id, account_posting_id = false){
        let isInsert        = !account_posting_id; 
        let order_id        = $("#account-posting-container").attr("orderid");
        let html            = ` 
                                <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                                <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="${order_id}" type="button">Add</button>
                            `;
        if(!isInsert){
             html                   =  ` 
                                        <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" isupdate="true" type="button">Cancel</button>
                                        <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="${order_id}" accountpostingid="${account_posting_id}" type="button">Update</button>
                                    `;
        }
        
        
        
        $(`#${div_id}`).find(".form-btn").html(html);
    }


    function formContentAnimation(div_id){
        $(".tab-form-content").hide(1000);
        $(`#${div_id}`).show(1500);
        $(`#${div_id}`).css("display","block");
    }

    function modifyAccountPosting(data, isInsert = true){

        let type     = isInsert ? "POST" : "PUT";
        let method   = isInsert ? "POST" : "PUT";
        let message  = isInsert ? "New Account Posting Added" : "Successfully Updated"; 

        $.ajax({
            method,
            type,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data,
            url: `${SYSTEM_URL}/order/create/modifyAccountPosting`,
            success:function(data){
                let order_id = data.order_id;
                Swal.fire({
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location.href = `${SYSTEM_URL}/order/edit/accounts-posting/${order_id}`;
                });
            },
            error:function(error){
                errorMessage(error);
            }
        });
    }



    function errorMessage(error, fromCustom = false){
        let errorArray  = "";
        let errorList   = "";
       if(!fromCustom){
            errorArray  = error.responseJSON.errors;
            errorList   = "";
        
            $.each(errorArray, function(key, value){
                errorList += `<li> <strong>- </strong>${value[0]}</li>`;
            });

       }else{
            errorList += `<li> <strong>- </strong> ${error.responseJSON.message}</li>`;
       }

       if(error.responseJSON.message && !error.responseJSON.errors){
            errorList += `<li> <strong>- </strong> ${error.responseJSON.message}</li>`;
       }
        
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