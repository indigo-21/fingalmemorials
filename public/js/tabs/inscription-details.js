$(document).ready(function(){
    const  SYSTEM_URL = $("body").attr("url");
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

    

});

