function RenderCart(response) {
    $("#change-item-card").empty().html(response);
    if ($("#quanty-cart").val() == null) {
        $("#quanty-cart-show").text(0);
    } else {
        $("#quanty-cart-show").text($("#quanty-cart").val());
    }
}

function AddCart(id) {
    $.ajax({
        url: 'them-gio-hang/' + id,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        alertify.success('Đã thêm vào giỏ hàng');
    })
}

$("#change-item-card").on("click", ".delete-cart", function () {
    $.ajax({
        url: 'xoa-gio-hang/' + $(this).data("id"),
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm trong giỏ hàng');
    })
})
