// $(".show-modal").click(function(e) {
    $('body').on('click', '.show-modal', function(e) {
    e.preventDefault();
    // $('#saveBtn').val("create-product");
    // $('#product_id').val('');
    // $('#productForm').trigger("reset");
    $("#ajaxModel").modal("show");
    $('.modal-title').html($(this).attr('title'));
    $.ajax({
        type: "get",
        url: $(this).attr("href"),
        // data: "data",
        // dataType: "dataType",
        success: function(response) {
            $(".modal-body").html(response);
        }
    });
});



$('body').on('click', '.delete', function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    var result = confirm('ลบหรือไม่');
    if (result) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: $(this).attr('href') + '/' + id,
            success: function(data) {
                table.draw();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    } else {
        return false;
    }
});
