$(".deleteDataInfo").click(function (e) {
    let dataID      = this.getAttribute("data-id");
    let dataName    = this.getAttribute("data-name");
    let dataUrl     = this.getAttribute("data-url");
    let tableID     = $(this).closest(".table").attr("id");
    let table       = $(`#${tableID}`).DataTable();
    // let dataContent = JSON.parse(this.getAttribute("data-content"));
    // let dataContent = "TEST";

    // console.log(dataContent);

    Swal.fire({
        title: "Are you sure you want to delete " + dataName + "?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "DELETE",
                url: `/${dataUrl}`,
                data: { id: dataID },
                success: function (data) {
                    table.row(`#tr${dataID}`).remove().draw(false);
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    ).then(function () {
                        location.reload();
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
});


function getCustomerOrder(dataID) {
    var result = "";

    $.ajax({
        url:'/customer/getCustomerOrders/'+dataID,
        dataType: 'json',
        async: false,
        // data: {id:dataID  },
        success: function (data) {                     
                result = data ;               
        },
        error: function (error) {
            console.log(error);
        },
    });
    return result;
}

$(".deleteCustomer").click(function (e) {
    let dataID      = this.getAttribute("data-id");
    let dataName    = this.getAttribute("data-name");
    let dataUrl     = this.getAttribute("data-url");
    let tableID     = $(this).closest(".table").attr("id");
    let table       = $(`#${tableID}`).DataTable();
    // let dataContent = JSON.parse(this.getAttribute("data-content"));
    // let dataContent = "TEST";

    // console.log(dataContent);

    let order  = getCustomerOrder(dataID);


    // getCustomerOrder(dataID)
    let text=`You won't be able to revert this!`
    if(order != ""){

        let tr="";
        order.map((data,index)=>{
            tr+= "<tr><td class='font-weight-bold'> <a href='order/edit/general-details/"+data.id +"' target='_blank'>"+data.id+"</a></td><td class='text-left'><a href='order/edit/general-details/"+data.id +"' target='_blank'>"+data.order_headline+"</a></td></tr>"               
           }) 
          text = "<strong>Note:</strong> There are existing order/s.<br>  <table class='table table-bordered  table-striped text-center'> <thead class='text-center'> <tr><th class='text-center'>Order Number</th><th class='text-center'>Order Headline</th></tr></thead><tbody>"+ tr+"</tbody></table>   "

          
    }
    console.log(dataUrl);
    Swal.fire({
        title: "You won't be able to delete "+ dataName +"!",
        html:text,
        icon: "info",
        showConfirmButton: (order == "") ,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
       
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "DELETE",
                url: `/${dataUrl}`,
                data: { id: dataID },
                success: function (data) {
                  
                    table.row(`#tr${dataID}`).remove().draw(false);
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    ).then(function () {
                        location.reload();
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
});

