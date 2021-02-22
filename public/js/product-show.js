$('#area').on('change', function () {
    $('#time-ship').html($(this).find(':selected').data('time'));
});

$('#descrip').click(function () {
    $('#detail').removeClass('btn-primary');
    $(this).addClass('btn-primary');
});
$('#detail').click(function () {
    $('#descrip').removeClass('btn-primary');
    $(this).addClass('btn-primary');
});

function show() {
    var z = document.getElementById("comment");
    if (z.style.display === "none") {
        z.style.display = "block";
    } else {
        z.style.display = "none";
    }
}

