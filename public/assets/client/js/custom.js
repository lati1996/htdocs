function AddCart(id) {
    $.ajax({
        type: "get",
        url: `/cart/add/${id}`,
        dataType: "html",
        success: function (response) {
            setTimeout(function () {
                window.location.reload();
            }, 3000);
        }
    });
}
function myFunctionPopup(id) {
    var popup = document.getElementById("myPopup-" + id);
    popup.classList.toggle("show");
}