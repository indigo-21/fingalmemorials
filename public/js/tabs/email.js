const  SYSTEM_URL   = $("body").attr("url"); 
const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

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

});


$(document).on("click", ".send-email", function(){
    sendOrderEmail();
});


function getEmailForm(){

    let formData                = new FormData;
    let emailForm               = $(".email-form");
    let order_id                = emailForm.attr("orderid");
    let email_to                = emailForm.find("[name=email_to]").val();
    let email_message           = emailForm.find("[name=email_message]").val();
    let order_details           = emailForm.find("[name=order_details]").is(":checked");
    let order_inscription       = emailForm.find("[name=order_inscription]").is(":checked");
    let order_invoice           = emailForm.find("[name=order_invoice]").is(":checked");
    let order_receipt           = emailForm.find("[name=order_receipt]").is(":checked");
    let attachment              = emailForm.find("[name=file]")[0].files[0];

    formData.append("order_id", order_id);
    formData.append("email_to", email_to);
    formData.append("email_message", email_message);
    formData.append("order_details", order_details);
    formData.append("order_inscription", order_inscription);
    formData.append("order_invoice", order_invoice);
    formData.append("order_receipt", order_receipt);
    formData.append("attachment", attachment);
    

    return formData;

}

function sendOrderEmail(){
    
    let formData = getEmailForm();


    $.ajax({
        type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/order/create/sendOrderEmail",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                let order_id = data;
                Swal.fire({
                    icon: "success",
                    title: "New Document Uploaded",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
    
                    window.location.href = `${SYSTEM_URL}/order/edit/email/${order_id}` ;
    
                });
            },
            error:function(error){
                // errorMessage(error);

                console.log(error);
            }
    });




}