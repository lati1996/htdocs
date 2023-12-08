function GetOrderNum() {
    var selectId = document.getElementById("slGroup").value;
    $.ajax({
        type: "get",
        url: `/admin/menu/getordernum/${selectId}`,
        dataType: "html",
        success: function (response) {
            $("#num").val(response);
        }
    });
}
function DeleteImg(id) {
    $.ajax({
        type: "get",
        url: `/admin/product/deleteImg/${id}`,
        dataType: "html",
        success: function (response) {
            alert(response);
            // location.reload();
        }
    });
}