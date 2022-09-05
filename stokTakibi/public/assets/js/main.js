function closeNav() {
    document.getElementById("YanMenu").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
}

function openNav() {
    if (max_width.matches) {
        document.getElementById("YanMenu").style.width = "17%";
        document.getElementById("main").style.marginLeft = "17%";
    } else {
        document.getElementById("YanMenu").style.width = "17%";
        document.getElementById("main").style.marginLeft = "17%";
    }
}

var max_width = window.matchMedia("(max-width: 1080px)");
function htmlEncode(value) {
    return $("<div/>").text(value).html();
}

//jquery
$(document).ready(function () {
    $("#screen").fadeOut(2000);
});
$(document).ready(function () {
    $("#closeBtn").click(function () {
        $("#YanMenu").fadeIn(5000);
    });
});
