$(document).ready(function(){
    const  SYSTEM_URL = $("body").attr("url");


    const  HAS_INVOICE  = $("#order_form").attr("hasinvoice") ? true : false;

    if(HAS_INVOICE){
        $("#inscription-details").find("textarea").attr("disabled", true);
       
        $("#inscription-details").find(".form-btn").remove();
    }

    getInscriptionData();


    function getInscriptionData(){
        let order_id    = $("#inscription_details").attr("orderid");
        let data        = {order_id};
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `${SYSTEM_URL}/order/create/getInscriptionData`,
            type: "POST",
            data,
            beforeSend:function(){
                
            },
            success:function(data){
                if(data.length != 0){
                    $(".note-editable").html(data[0].inscription_details);
                    $(".inscription-button").removeClass("add-inscription-details").addClass("update-inscription-details");
                    $(".inscription-button").attr("inscriptionid", data[0].id);
                    $(".inscription-button").text("Update");
                }
            },
            error:function(error){

            }
        });
    }

    $(document).on("click",".add-inscription-details", function(){
        let inscription_details = $(".note-editable").html();
        let order_id            = $(this).attr("orderid");
        let data                = {order_id,inscription_details};

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `${SYSTEM_URL}/order/create/modifyInscriptionDetails`,
            type: "POST",
            data,
            beforeSend:function(){
                
            },
            success:function(data){
                Swal.fire({
                    icon: "success",
                    title: "New Inscription Added",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    getInscriptionData();
                });
            },
            error:function(error){

            }
        });


    });

    $(document).on("click",".update-inscription-details", function(){
        let inscription_details     = $(".note-editable").html();
        let order_id                = $(this).attr("orderid");
        let inscription_detail_id   = $(this).attr("inscriptionid");
        let data                    = {inscription_detail_id, order_id, inscription_details};

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `${SYSTEM_URL}/order/create/modifyInscriptionDetails`,
            type: "POST",
            data,
            beforeSend:function(){
                
            },
            success:function(data){
                Swal.fire({
                    icon: "success",
                    title: "Inscription Update",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    getInscriptionData();
                });
            },
            error:function(error){

            }
        });


    });

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

