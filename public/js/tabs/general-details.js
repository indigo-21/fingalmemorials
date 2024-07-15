const SYSTEM_URL   = $("body").attr("url");
const HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;
const CURRENT_DATE = new Date();
const YEAR         = CURRENT_DATE.getFullYear();
const MONTH        = String(CURRENT_DATE.getMonth() + 1).padStart(2,"0");
const DAY          = String(CURRENT_DATE.getDate()).padStart(2,"0");
const DATE_STRING  = `${MONTH}/${DAY}/${YEAR}`;


$(document).ready(function(){

    if(HAS_INVOICE){
        $("#general-details").find("input").attr("disabled", true);
        $("#general-details").find("textarea").attr("disabled", true);
        $("#general-details").find("select").attr("disabled", true);
       
        // EXEPTION
        $("[name=order_complete]").attr("disabled", false);
        $("[name=inscription_completed]").attr("disabled", false);
        $("[name=inscription_completed_date]").attr("disabled", false);
        $("[name=job_was_fixed_on]").attr("disabled", false);
    }

    if($("[name=customer]").find(":selected").val()){
        $("[name=customer]").trigger("change");
    }


});






$(document).on("click", "[name=inscription_completed]",function(){
    let isChecked = $(this).is(":checked");
    $("[name=inscription_completed_date]").val("");
    if(isChecked){
        $("[name=inscription_completed_date]").val(DATE_STRING);
    }
});


$(document).on("change","#input-cemetery",function(){
    let area    = $(this).find(":selected").attr("area");
    let group   = $(this).find(":selected").attr("group");
    $("#cemetery_area").val(area);
    $("#cemetery_group").val(group);
});


// Related on CUSTOMER DETAILS
    $(document).on("click", ".checkBox-newCustomer", function (e) {
        let isExist  = $(this).attr("isexist") == 1;

        if (!isExist) {
            
            $(".choose-customer-text").attr("hidden", true);
            // $(".customer-form").attr("hidden", false);
            $(".customer-form .input-form").val("");
            $(".customer-form .input-form .selectpicker")
                .find("option:selected")
                .remove();
            $(".chosen-customer option:first").prop('selected',true).trigger("change");
            $("[name=title_id] option:first").prop('selected',true).trigger("change");
            
            let hideCustomerForm = false;
            customerForm(false,hideCustomerForm);
            
        } else {
            $(".choose-customer-text").attr("hidden", false);
            $(".customer-form").attr("hidden", false);
            
            let hideCustomerForm = true;
            customerForm(false, hideCustomerForm);
            
        }
    });

    $(document).on("click",".chosen-customer",function(){
        let customerId = $(this).find("select option:selected").val();

        if(customerId){
            $.ajax({
                type: "GET",
                async: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: `${SYSTEM_URL}/order/create/findCustomer/${customerId}`,
                beforeSend:function(){
                    customerForm(true);
                    $(".customer-form").attr("hidden", false);
                },
                success: function (data) {
                    console.log(data);
                    $("[name=title_id]").val(data.title_id).trigger("change");
                    $("[name=firstname]").val(data.firstname);
                    $("[name=middlename]").val(data.middlename);
                    $("[name=surname]").val(data.surname);
                    $("[name=mobile]").val(data.mobile);
                    $("[name=telno]").val(data.telno);
                    $("[name=email]").val(data.email);
                    $("[name=account_number ]").val(data.account_number);
                    $("[name=address1]").val(data.address1);
                    $("[name=address2]").val(data.address2);
                    $("[name=address3]").val(data.address3);
                    $("[name=town]").val(data.town);
                    $("[name=county]").val(data.county);
                    $("[name=postcode]").val(data.postcode);
                    $(".create-submit").attr("customerid", data.id);

                   
                    $("[name=customer]").attr("disabled", false);
                    $("[name=customer]").selectpicker("destroy");
                    $("[name=customer]").selectpicker();
                },

                error: function (error) {},
            });
        }


        
    });
// END Related on CUSTOMER DETAILS


// Related on GENERAL DETAILS

    function getGeneralDetails(){
        let data = {
            order_type_id:              $("[name=order_type_id]").val(),
            order_branch:               $("[name=order_branch]").val(),
            deceased_name:              $("[name=deceased_name]").val(),
            date_of_death:              $("[name=date_of_death]").val(),
            order_headline:             $("[name=order_headline]").val(),
            cemetery_id:                $("[name=cemetery_id]").find(":selected").val(),
            grave_space_id:             $("[name=grave_space_id]").find(":selected").val(),
            plot_grave:                 $("[name=plot_grave]").val(),
            // APPROVALS FIELDS
            order_complete:             $("[name=order_complete]").val() == "1" ? true : false,
            inscription_completed:      $("[name=inscription_completed]").is(":checked") ? "1" : "0",
            inscription_completed_date: $("[name=inscription_completed_date]").val(),
            job_was_fixed_on:           $("[name=job_was_fixed_on]").val(),
            // END APPROVALS FIELDS
            source_id:                  $("[name=source_id]").find(":selected").val(),
            category_id:                $("[name=category_id]").val(),
            area:                       $("[name=area]").val(),
            order_date:                 $("[name=order_date]").val(),
            special_instructions:       $("[name=special_instructions]").val(),

        };
        return data;
    }

    function getCustomerDetails(){
        let data = {
            title_id:           $("[name=title_id]").val(),
            firstname:          $("[name=firstname]").val(),
            middlename:         $("[name=middlename]").val(),
            surname:            $("[name=surname]").val(),
            mobile:             $("[name=mobile]").val(),
            telno:              $("[name=telno]").val(),
            email:              $("[name=email]").val(),
            account_number :    $("[name=account_number ]").val(),
            address1:           $("[name=address1]").val(),
            address2:           $("[name=address2]").val(),
            address3:           $("[name=address3]").val(),
            town:               $("[name=town]").val(),
            county:             $("[name=county]").val(),
            postcode:           $("[name=postcode]").val(),
        };
        return data;
    }

    $(document).on("click",".create-submit",function(){ 
        let customerData = getCustomerDetails();
        let orderData    = getGeneralDetails();
        let customer_id  = $(this).attr("customerid");
        let data         = !customer_id ? { customerData, orderData } : { customer_id, customerData, orderData  };

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data,
            url: "/order/create/modifyGeneralDetails",
            success:function(data){
                let order_id  = data;

                Swal.fire({
                    icon: "success",
                    title: "New Order Created",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){

                    window.location.href = `${SYSTEM_URL}/order/edit/general-details/${order_id}` ;

                });
            },
            error:function(error){
                errorMessage(error);
            }
        });
    });

    $(document).on("click",".edit-submit",function(){
        let order_id     = $(this).attr("orderid");
        let customer_id  = $(this).attr("customerid");
        let customerData = getCustomerDetails();
        let orderData    = getGeneralDetails();
        let data         = { order_id, customer_id, customerData, orderData };


        $.ajax({
            type: "PUT",
            method: "PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data,
            url: "/order/create/modifyGeneralDetails",
            success:function(data){
                let order_id  = data;

                Swal.fire({
                    icon: "success",
                    title: "Successfully Order Updated",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){

                    window.location.href = `${SYSTEM_URL}/order/edit/general-details/${order_id}` ;

                });
            },
            error:function(error){

            }
        });
    });

// END Related on GENERAL DETAILS



function customerForm(disabled = true, hideCustomerForm = false){
    $(".customer-form").show();
    $(".customer-form").find("input").attr("disabled", disabled);
    $("#customer_form").find("select").attr("disabled", disabled);
    $(".customer-form").find("select").attr("disabled", disabled);

    $("#customer_form").find("select").selectpicker("destroy");
    $("#customer_form").find("select").selectpicker();

    $(".customer-form").find("select").selectpicker("destroy");
    $(".customer-form").find("select").selectpicker();


    if(hideCustomerForm){
        $(".customer-form").hide();
    }
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