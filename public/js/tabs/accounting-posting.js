$(document).ready(function(){
    const  SYSTEM_URL = $("body").attr("url");
    

    $(document).on("change", "#payment_type", function(){
        let div_id  =   `tab-form-content-${$(this).val()}`;
        formContentAnimation(div_id);
        changeButtons(div_id,"insert");
    });

    $(document).on("change",".payment-type", function(){
        let reason  = $(this).find(":selected").attr("reason");
        $(this).closest(".tab-form-content").find("[name=reason]").val(reason);
    });

    $(document).on("click", ".add-account-posting", function(){
        let thisForm        = $(this).closest(".tab-form-content");
        let order_id        = $(this).attr("orderid");
        let account_type_id = $("[name=account_type_id]").find(":selected").val();   
        let date_received   = thisForm.find("[name=date_received]").val();   
        let payment_type_id = thisForm.find("[name=payment_type_id]").find(":selected").val();   
        let reason          = thisForm.find("[name=reason]").val();   
        let payment         = thisForm.find("[name=payment]").val();   
        let invoice_to      = thisForm.find("[name=invoice_to]").val();

        let data = {
            order_id, account_type_id, date_received, payment_type_id,reason,payment,invoice_to
        };

        modifyAccountPosting(data);

    });

    $(document).on("click",".edit-account-posting",function(){
        let account_posting_id  = $(this).attr("accountpostingid");
        let div_id              = `tab-form-content-${account_posting_id}`;
        let account_type_id     = $(this).attr("accounttypeid");
        let date_received       = $(this).attr("datereceived");
        let payment_type_id     = $(this).attr("paymenttypeid");
        let reason              = $(this).closest("tr").find(".reason").text();
        let payment             = $(this).attr("payment");

        $("[name=account_type_id]").val(account_type_id).trigger("change");   
        $(`#${div_id}`).find("[name=date_received]").val(date_received);   
        $(`#${div_id}`).find("[name=payment_type_id]").val(payment_type_id).trigger("change"); 
        $(`#${div_id}`).find("[name=reason]").val(reason);   
        $(`#${div_id}`).find("[name=payment]").val(payment);   

        changeButtons(div_id,"update")
        
        // formContentAnimation(div_id);
        
    });

    $(document).on("click",".update-account-posting", function(){

    });

    $(document).on("click",".cancel-account-posting", function(){
        // let type    = $(this).attr("isupdate") == "true" ? "insert" : "update";
        let type    = "insert";
        let div_id  = $(this).closest(".tab-form-content").attr("id");
        changeButtons(div_id, type);
    });



    

    function changeButtons(div_id, type = "insert"){
        let order_id    = $("#account-posting-container").attr("orderid");
        let html        = ` 
                            <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" type="button">Cancel</button>
                            <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="${order_id}" type="button">Add</button>
                          `;
        if(type != "insert"){
             html        =  ` 
                                <button class="btn btn-light btn-icon-notika waves-effect cancel-account-posting" isupdate="true" type="button">Cancel</button>
                                <button class="btn btn-primary btn-icon-notika waves-effect add-account-posting" orderid="${order_id}" type="button">Update</button>
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

            }
        });
    }



    // function getAccountPostingData(data){
        
    //     payment_type_id 
    //     payment
    //     account_type_id
    //     invoice_to


    // }

});