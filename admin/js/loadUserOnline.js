function loadUserOnline() {
    $.get("function.php?onlineusers  = result ", function (data) {
        $(".usersOnline").text(data);
    });
}
