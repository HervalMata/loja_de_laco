$(document).ready(function () {
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        // alert(passwordCurrent);
        $.ajax({
            type: 'post',
            url: "/admin/check-current-pwd",
            data: {current_pwd: current_pwd},
            success: function (resp) {
                if (resp === "false") {
                    $("#chkCurrentPwd").html("<font color=red>Senha Atual está incorreta</font>");
                } else if (resp === "true") {
                    $("#chkCurrentPwd").html("<font color=green>Senha Atual está correta</font>");
                }
            }, error: function () {
                alert("Error");
            }
        });
    });
});
