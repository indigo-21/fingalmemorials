const  SYSTEM_URL   = $("body").attr("url");
const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

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


});


$(document).on("change","#input-cemetery",function(){
    let area = $(this).find(":selected").attr("area");
    $("#cemetery_area").val(area);
});


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
    let data         = { customerData, orderData };

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

// Related on CUSTOMER DETAILS

$(document).on("click", ".checkBox-newCustomer", function (e) {
    // let check=e.target.checked;
    if (e.target.checked === true) {

        $(".choose-customer-text").attr("hidden", true);
        $(".customer-form").attr("hidden", false);
        $(".customer-form .input-form").val("");
        $(".customer-form .input-form .selectpicker")
            .find("option:selected")
            .remove();
        $(".chosen-customer option:first").prop('selected',true).trigger("change");
        $("[name=title_id] option:first").prop('selected',true).trigger("change");
        
    } else {
        $(".choose-customer-text").attr("hidden", false);
        $(".customer-form").attr("hidden", false);
    }
});

$(document).on("change", ".chosen-customer", function (e) {
    // console.log(e.target.value);
    let customerId = e.target.value;

    $.ajax({
        type: "GET",
        async: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "findCustomer/" + customerId,
        success: function (data) {
            
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
        },

        error: function (error) {},
    });
    $(".customer-form").attr("hidden", false);
});

// END Related on CUSTOMER DETAILS
