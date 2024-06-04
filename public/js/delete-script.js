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
