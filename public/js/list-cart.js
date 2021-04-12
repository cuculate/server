let totalRowCount = $("#cart-show .pr-cart-item").length;

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
    $('.price').each(function() {
        if($(this).data('price')) {
            totalPrice.push($(this).data('price'));
        }});
    $('input.product-quantity').each(function() {
            totalQuanty.push(Number($(this).val()));
        });

    for(i = 0; i < totalRowCount; i++ ){
        total += totalPrice[i] * totalQuanty[i];
    };
    $('#total-price').empty();
    $('#total-price').html((total).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' VNĐ');
    $('#sub-total').empty();
    $('#sub-total').html((total).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' VNĐ');
};

$("#cart-show").on("click", ".delete-cart", function () {
    $.ajax({
        url: 'xoa-gio-hang/' + $(this).data("id"),
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm trong giỏ hàng');
        totalRowCount -=1;
        totalPrice(totalRowCount)
    });
});

$("#cart-show").on("click",".btn-increase",function () {
    let id = $(this).data("id");
    let quanty = $('#quanty-' + id).val();
    let valuePrice = $('#price-' + id).data("price");

    $.ajax({
        url: 'cap-nhat-soluong-san-pham/' + id + '/' + quanty,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        RenderProductCart(id, valuePrice, quanty);
        totalPrice(totalRowCount);
        alertify.success('Đã cập nhật số lượng sản phẩm trong giỏ hàng');
    });
});
$("#cart-show").on("click",".btn-reduce",function () {
    let id = $(this).data("id");
    let quanty = $('#quanty-' + id).val();
    let valuePrice = $('#price-' + id).data("price");

    $.ajax({
        url: 'cap-nhat-soluong-san-pham/' + id + '/' + quanty,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        RenderProductCart(id, valuePrice, quanty);
        totalPrice(totalRowCount);
        alertify.success('Đã cập nhật số lượng sản phẩm trong giỏ hàng');
    });
});
