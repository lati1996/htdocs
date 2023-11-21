function AddCart(id) {
    $.ajax({
        type: "get",
        url: `/cart/add/${id}`,
        dataType: "html",
        success: function (response) {
            if (response == "") {
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }
            else {
                window.location.href = '/signin';
            }
        }
    });
}
function myFunctionPopup(id) {
    var popup = document.getElementById("myPopup-" + id);
    popup.classList.toggle("show");
}
$('#EditAdress').click(function () {
    var textAddress = document.getElementById("Address-View");
    var inputAddress = document.getElementById("Address");
    textAddress.style.display = 'none';
    inputAddress.style.display = 'block';
});
function payment() {
    var pmPanel = document.getElementById("paymentPanel");
    var thkPanel = document.getElementById("thankPanel");
    pmPanel.style.display = 'none';
    thkPanel.style.display = 'block';
    setTimeout(function () {
        window.location.href = '/home';
    }, 5000);
}