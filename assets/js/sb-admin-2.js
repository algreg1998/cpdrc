$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    // var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    // if (element.is('li')) {
    //     element.addClass('active');
    // }

    $(".tooltip").tooltip();

    $(".generalAlertify").click(function(){
        var red = $(this).attr("href");
        var type = $(this).attr("data-type");
        var item = $(this).attr("data-item");
        alertify.set({ labels: {
            ok     : "Yes",
            cancel : "No"
        } });
        alertify.confirm("Are you sure you want to "+type+" <strong>"+item+"</strong>?", function (e) {
            if (e) {
                window.location.href = red;
            } else {
                return false;
            }
        });

        return false;
    });
});
