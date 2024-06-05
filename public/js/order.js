const  SYSTEM_URL = $("body").attr("url");

$(document).on("change","#input-cemetery",function(){
    let area = $(this).find(":selected").attr("area");
    $("#cemetery_area").val(area);
});


// Related on GENERAL DETAILS

function getGeneralDetails(){
    let data = {
        order_type_id:          $("[name=order_type_id]").val(),
        order_branch:           $("[name=order_branch]").val(),
        deceased_name:          $("[name=deceased_name]").val(),
        date_of_death:          $("[name=date_of_death]").val(),
        order_headline:         $("[name=order_headline]").val(),
        cemetery_id:            $("[name=cemetery_id]").find(":selected").val(),
        grave_space_id:         $("[name=grave_space_id]").find(":selected").val(),
        plot_grave:             $("[name=plot_grave]").val(),
        inscription_completed:  $("[name=inscription_completed]").val(),
        job_was_fixed_on:       $("[name=job_was_fixed_on]").val(),
        source_id:              $("[name=source_id]").find(":selected").val(),
        category_id:            $("[name=category_id]").val(),
        area:                   $("[name=area]").val(),
        order_date:             $("[name=order_date]").val(),
        special_instructions:   $("[name=special_instructions]").val(),

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

