/********jquery.scrolltop.min.js********/
!
function(a) {
    a.scrolltop = function(b) {
        var c = {
            template: "^",
            duration: 1e3,
            "class": ""
        };
        b = a.extend({},
        c, b);
        var d = a("body"),
        e = a(window),
        f = a("<a></a>").attr("href", "#").addClass("scrolltop " + b["class"]).html(b.template).click(function(c) {
            c.preventDefault(),
            a("body, html").animate({
                scrollTop: 0
            },
            b.duration)
        }).appendTo(d);
        e.scroll(function(b) {
            var c = a(this).scrollTop();
            c > a(this).height() / 2 ? f.addClass("active") : f.removeClass("active")
        })
    }
} (jQuery);

/********scrolltop.init.js********/
(function($) {
    $.scrolltop({
        template: '↑',
        duration: 1000,
        class: 'custom-scrolltop'
    })
})(jQuery);
