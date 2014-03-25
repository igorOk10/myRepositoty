 

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {

    $(window).bind("load ", function() {

        $('#side-menu').metisMenu();
    });
    
    $(window).bind("load resize", function() {

        $('#side-menu').metisMenu();

        console.log($(this).width())
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})
