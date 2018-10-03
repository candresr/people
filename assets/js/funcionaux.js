$(document).ready(function(){
    $(window).scroll(function() {
        if ($(document).scrollTop() > 700) {
            $("#headerwhite").addClass("navbar-fixed-top");
            //$("#lolas").addClass("fadeInDown");
            $("#headerwhite").removeClass("displaynone");

        } else {
            $("#headerwhite").addClass("displaynone");
            $("#headerwhite").removeClass("navbar-fixed-top");
            //$("#lolas").removeClass("");
        }
    });
});