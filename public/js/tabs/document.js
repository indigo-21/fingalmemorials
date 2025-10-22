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
    const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

    // if(HAS_INVOICE){
    //     $("#document").find("input").attr("disabled", true);
    //     $("#document").find("textarea").attr("disabled", true);
    //     $("#document").find("select").attr("disabled", true);
       
    //     $("#document").find(".form-btn").remove();
    // }
    

    $(document).on("click", ".add-document", function(){
        let order_id    = $(this).attr("orderid");
        modifyDocument(order_id);
    });

    $(document).on("click", ".delete-btn", function(){
        let order_id                = $(this).attr("orderid");
        let document_description    = $(this).attr("documentname");
        let data                    = { table: $(this).attr("from"), id: $(this).attr("documentid")}
             Swal.fire({
                    icon: "warning",
                    title:"Are you sure?",
                    text: `Once deleted, you will not be able to recover ${document_description}.`,
                    showCancelButton: true,
                    confirmButtonColor: '#8965dc',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((confirmed) => {
                    if(confirmed){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: `${SYSTEM_URL}/order/softDeletes`,
                            type: "POST",
                            data,
                            success:function(data){
                                Swal.fire({
                                    icon: "success",
                                    title: `${document_description} is deleted!`,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function(){
                                    window.location.href = `${SYSTEM_URL}/order/edit/document/${order_id}`;
                                    alterForm();
                                    alterButton();
                                });
                            },
                            error:function(error){
                                errorMessage(error);
                            }
                        });
                    }else{
                        Swal("Cancelled", `${document_description} is safe :)`, "error");
                        
                    }
                });
    })

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
                errorMessage(error);
            }
        });



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