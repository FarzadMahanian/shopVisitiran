jQuery(document).ready(function($) {
    /** Variables from Customizer for Slider settings */
    if( wedding_band_data.auto == '1' ){
         var slider_auto = true;
    }else{
         slider_auto = false;
    }

    if( wedding_band_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }  

    if( wedding_band_data.animation == 'fade' ){
         var slider_animation = 'fadeOut';
    }else{
          var slider_animation = '';
    }

    $('.map').click(function() {
        $('.map iframe').css("pointer-events", "auto");
    });

    $(".map").mouseleave(function() {
        $('.map iframe').css("pointer-events", "none");
    });

    $("#lightSlider").lightSlider({
        item: 4,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        enableDrag: false,
        slideMargin: 0,

        responsive: [{
            breakpoint: 992,
            settings: {
                item: 2,
                slideMove: 1,
                slideMargin: 0,
            }
        }, {
            breakpoint: 768,
            settings: {
                item: 1,
                slideMove: 1
            }
        }],
    });

    /* Equal Height */
    $('.blog-section .col .post').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

    //nice scroll
    $(".section-4 .text-holder").niceScroll({
        cursorcolor: "#222",
        zindex: "999999",
        cursorborder: "none",
        cursoropacitymin: "1",
        cursoropacitymax: "1",
        cursorwidth: "8px",
        cursorborderradius: "0px;"
    });

    $('#site-navigation').meanmenu({
        meanScreenWidth: "991",
        meanRevealPosition: "center"
    });

    //banner slider
    $('.banner-slider').owlCarousel({
        loop: slider_loop,
        auto: slider_auto,
        animateOut: slider_animation,
        margin: 0,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });

});
