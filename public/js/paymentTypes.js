$(".deleteDataInfo").click(function (e) {
    let dataID = this.getAttribute("data-id");
    let dataContent = JSON.parse(this.getAttribute("data-content"));

    // console.log(dataContent);

    Swal.fire({
        title: "Are you sure you want to delete " + dataContent.name + "?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
             console.log(dataID);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "POST",
                url: "/deletePaymentType",
                data: { id: dataID },
                success: function (data) {
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
