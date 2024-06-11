$(document).ready(function(){
    const  SYSTEM_URL = $("body").attr("url");
    const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

    if(HAS_INVOICE){
        $("#document").find("input").attr("disabled", true);
        $("#document").find("textarea").attr("disabled", true);
        $("#document").find("select").attr("disabled", true);
       
        $("#document").find(".form-btn").remove();
    }
    

    $(document).on("click", ".add-document", function(){
        let order_id    = $(this).attr("orderid");
        modifyDocument(order_id);
    });


    function modifyDocument(order_id){
        let formData    =   new FormData;

        let fileInput           = $("[name=file]")[0].files[0];
        let description         = $("[name=document_description]").val();
        let document_type_id    = $("[name=document_type_id]").find(":selected").val();
        formData.append("file",fileInput);
        formData.append("order_id",order_id);
        formData.append("description",description);
        formData.append("document_type_id",document_type_id);

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/order/create/modifyDocument",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                Swal.fire({
                    icon: "success",
                    title: "New Document Uploaded",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
    
                    window.location.href = `${SYSTEM_URL}/order/edit/document/${order_id}` ;
    
                });
            },
            error:function(error){
    
            }
        });



    }
});