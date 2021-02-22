let totalRowCount = $("#table>tbody tr").length;

function RenderCart(response) {
    $("#change-item-card").empty();
    $("#change-item-card").html(response);
    if ($("#quanty-cart").val() == null)
    {
        $("#quanty-cart-show").text(0);
    } else {
        $("#quanty-cart-show").text($("#quanty-cart").val());
    }
}

function RenderProductCart(id, valuePrice, quanty) {
    $('#product-price-' + id).empty();
    $('#product-price-' + id).html((valuePrice * quanty).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' VNĐ');
}

function totalPrice(totalRowCount)
{
    let totalPrice = [];
    let totalQuanty = [];
    let i = 0;
    let total = 0;
    $('.gia-sanpham').each(function() {
        if($(this).data('price')) {
            totalPrice.push($(this).data('price'));
        }});
    $('select.quanty').each(function() {
        if($(this).children("option:selected").val()) {
            totalQuanty.push($(this).children("option:selected").val());
        }});

    for(i = 0; i < totalRowCount; i++ ){
        total += totalPrice[i] * totalQuanty[i];
    }
    $('#total-price').empty();
    $('#total-price').html((total).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' VNĐ');
}

$("#cart-show").on("click", ".delete-cart", function () {
    var row = document.getElementById('row-' + $(this).data("id"));
    $.ajax({
        url: 'xoa-gio-hang/' + $(this).data("id"),
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm trong giỏ hàng');
        row.parentNode.removeChild(row);
        totalRowCount -=1;
        totalPrice(totalRowCount)
    })
})

$("select.quanty").change(function () {
    let quanty = $(this).children("option:selected").val();
    let id = $(this).data("id");
    let valuePrice = $('#price-' + id).data("price");

    $.ajax({
        url: 'cap-nhat-soluong-san-pham/' + id + '/' + quanty,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        RenderProductCart(id, valuePrice, quanty);
        totalPrice(totalRowCount);
        alertify.success('Đã cập nhật số lượng sản phẩm trong giỏ hàng');
    })
});
