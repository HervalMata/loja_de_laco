$(document).ready(function () {
    $("#passwordCurrent").keyup(function () {
        var passwordCurrent = $("passwordCurrent").val();
        alert(passwordCurrent);
        $.ajax({
            type: 'post',
            url: "/admin/check-current_pwd",
            data: {passwordCurrent: passwordCurrent},
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
