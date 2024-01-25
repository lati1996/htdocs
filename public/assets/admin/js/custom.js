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
function btnUnread(id) {
    document.getElementById('input1_' + id).removeAttribute('readonly');
    document.getElementById('input2_' + id).removeAttribute('readonly');
    document.getElementById('btnUnread_' + id).style.display = 'none';
    document.getElementById('btnUpdate_' + id).style.display = 'block';
}

