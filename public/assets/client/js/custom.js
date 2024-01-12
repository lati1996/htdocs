function AddCart(id, qua) {
    $.ajax({
        type: "get",
        url: `/cart/add/?proid=${id}&qua=${qua}`,
        dataType: "html",
        success: function (response) {
            if (response == "") {
                setTimeout(function () {
                    window.location.reload();
                }, 5000);
                myFunctionPopup(id);
            }
            else {
                window.location.href = '/signin';
            }
        }
    });
}
function Buynow(id, qua) {
    $.ajax({
        type: "get",
        url: `/cart/add/?proid=${id}&qua=${qua}`,
        dataType: "html",
        success: function (response) {
            if (response == "") {
                window.location.href = '/cart';
            }
            else {
                window.location.href = '/signin';
            }
        }
    });
}
function CheckThisField(key) {
    var info = document.getElementById(key).value;
    $.ajax({
        type: "get",
        url: `/signup/checkinfo/${info}`,
        dataType: "html",
        success: function (response) {
            if (response != "") {
                document.getElementById(key).style.border = "1px solid #56ae6c";
                document.getElementById(key).style.borderWidth = "0.15rem";
                document.getElementById("w_" + key).style.display = "block";
            }
            else {
                document.getElementById(key).style.border = "1px solid #e8e8e8";
                document.getElementById("w_" + key).style.display = "none";
            }
        }
    });
}

function CheckPassword() {
    var pass = document.getElementById("password").value;
    var repass = document.getElementById("repassword").value;
    if (pass != repass) {
        document.getElementById("w_pass").style.display = "block";
    }
    else {
        document.getElementById("w_pass").style.display = "none";
    }
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

$(function () {
    // alert("ok");
    // lấy danh sách tỉnh
    $.ajax({
        type: "get",
        url: "/address/filladdress",
        dataType: "html",
        success: function (response) {
            $("#tinhThanh").html(response);
            var data = $("#tinhThanh").data();
            $("#tinhThanh").val(data.value);
            $("#tinhThanh").change();
        },
    });
    // khi chọn tỉnh thành phố thì
    //load danh sách quận huyen
    $("#tinhThanh").change(function () {
        //alert($(this).val());
        var maTinh = $(this).val();
        $.ajax({
            type: "get",
            url: `/address/filladdress/?maTinh=${maTinh}`,
            dataType: "html",
            success: function (response) {
                $("#quanHuyen").html(response);
                var data = $("#quanHuyen").data();
                $("#quanHuyen").val(data.value);
                $("#quanHuyen").change();
            },
        });
    });
    $("#quanHuyen").change(function () {
        var maTinh = $("#tinhThanh").val();
        var maHuyen = $(this).val();
        $.ajax({
            type: "get",
            url: `/address/filladdress/?maTinh=${maTinh}&maHuyen=${maHuyen}`,
            dataType: "html",
            success: function (response) {
                $("#phuongXa").html(response);
                var data = $("#phuongXa").data();
                $("#phuongXa").val(data.value);
            },
        });
    });
});

$(window).on('load', function (event) {
    var content = document.getElementById('loadproduct');
    $('body').removeClass('load');
    $('.load').delay(1000).fadeOut('400');
    $('body').removeClass('loadHome');
    $('.loadHome').delay(500).fadeOut('400');
    setTimeout(function () {
        content.style.display = "flex";
    }, 900);

});
