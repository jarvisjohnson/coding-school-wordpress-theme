<script type="text/javascript">
var f = (function () {
    var navHeight = $("#masthead").height();
    var heroHeight = $("#featured-hero").height();
    var switchHeight = $(".switch").height();
    var offset = heroHeight + navHeight - switchHeight;
    var barOffset = offset + switchHeight;
    var body = $("body");
    var fix = $("#fixed-bar");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= offset) {
            body.addClass("fixNav");
        } else {
            body.removeClass("fixNav");
        }
        // if (scroll >= barOffset) {
        //     fix.addClass("fix").height(switchHeight*1.5);
        // } else {
        //     fix.removeClass("fix").height(0);
        // }
    });
});
$(document).ready(f);
$(window).resize(f);
</script>