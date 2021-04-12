$("select#area").change(function () {
    let area = $(this).children("option:selected").val();
    let id = $(this).val();
    let timeShip = $('#time-' + id).data("time");
    $("#time-ship").empty();
    $("#time-ship").text('Vận chuyển ' + timeShip);
});
