$(document).ready(function() {
    $("nav-link").click(function() {
        $('html,body').animate({
            scrollTop: $(".main-content").offset().top},
            'slow');
    });
});