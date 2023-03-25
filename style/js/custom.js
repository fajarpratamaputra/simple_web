/*--------------------------------------------------
* Header Fixed
*--------------------------------------------------*/
$(document).ready(function () {
    $(".navbar-toggler").click(function () {
        $('html').toggleClass('show-menu');
    });

    function scrolling() {
        var sticky = $('.navbar'),
            scroll = $(window).scrollTop();

        if (scroll >= 15) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    };
    scrolling();
    $(window).scroll(scrolling);

    /*--------------------------------------------------
    * BACK TO TOP STARTS Here
    *--------------------------------------------------*/

    $("#back-to-top").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
            return false;
        });
    });

    /*--------------------------------------------------
    * Header Menu Active
    *--------------------------------------------------*/

    $(".navbar-nav li a").each(function () {
        var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
        var pathname = pathname1.replace("#/", "");
        if ($(this).attr('href') == pathname) {
            $(this).parent().addClass('current-menu-item');
        }
    });

    $(".navbar-nav li ul.dropdown-menu li a").each(function () {
        var pathname1 = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
        // alert(pathname1);
        var pathname = pathname1.replace("#/", "");
        if ($(this).attr('href').indexOf(pathname1) > -1) {
            $(this).parent().addClass('current-menu-item');
            $(this).parent().parent().parent().addClass('current-menu-item');
        }
    });

    /* ========================================== 
    Header Mobile
    ========================================== */
    responsiveResize();
    $(window).resize(responsiveResize);
    
});



$(window).on('load', function(){
    /*--------------------------------------------------
    * Spinner Loader
    *--------------------------------------------------*/

    $(".loader").fadeOut("1500");

    /*--------------------------------------------------
    * Development Tabs
    *--------------------------------------------------*/

    $('.development-tabs').each(function() {
    $(this).find('.tabs-heading li').first().addClass('current');
    $(this).find('.tab-content').first().addClass('current');
    });
    $('.tabs-heading li').on( 'click', function(){
        var tab_id = $(this).attr('data-tab');
        $(this).siblings().removeClass('current');
        $(this).parents('.development-tabs').find('.tab-content').removeClass('current');
        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    });


});

/*--------------------------------------------------
* Round Circle-Progress Bar 
*--------------------------------------------------*/
$(window).on('scroll', function () {
    $('.circle-progress').each(function() {
        var bar_color1 = $(this).data('color1');
        var bar_color2 = $(this).data('color2');
        var pos_y = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (pos_y < topOfWindow + 900) {
            $(this).find('.inner-bar').easyPieChart({
                barColor: function(percent) {
                        var ctx = this.renderer.getCtx();
                        var gradient = ctx.createLinearGradient(45,0,0,90);
                            gradient.addColorStop(0, bar_color1);
                            gradient.addColorStop(1, bar_color2);
                        return gradient;
                    },
                trackColor: false,
                scaleColor: false,
                lineCap: 'round',
                lineWidth: 20,
                size: 195,
                animate: 1000,
                onStart: $.noop,
                onStop: $.noop,
                easing: 'easeOutBounce',
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent)) + '%';
                }
            });
        }
    });

    /*--------------------------------------------------
    * progress bar
    *--------------------------------------------------*/

    $('.seomek-progress').each(function() {
        var pos_y = $(this).offset().top;
        var value = $(this).find(".progress-bar").data('percent');
        var topOfWindow = $(window).scrollTop();
        if (pos_y < topOfWindow + 800) {
            $(this).find(".progress-bar").css({
                'width': value
            }, "slow");
        }
    });

    /*--------------------------------------------------
    * SeoMek-Counter Number
    *--------------------------------------------------*/

    $('.seomek-counter').each(function() {
        var pos_y   = $(this).offset().top - window.innerHeight;
        var $this   = $(this).find('.num'),
            countTo = $this.attr('data-to'),
            during  = parseInt( $this.attr('data-time') ),
            topOfWindow = $(window).scrollTop();

        if ( pos_y < topOfWindow ) {    
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            },
            {
                duration: during,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        }
    });
});

/*--------------------------------------------------
* Search on Header
*--------------------------------------------------*/
$('.toggle_search').on("click", function(){
    $(this).toggleClass( "active" );
    $('.h-search-form-field').toggleClass('show');
    if ($(this).find('i').hasClass( "fa-search" )) {
        $('.toggle_search > i').removeClass( "fas fa-search" ).addClass("fas fa-times");
    }else{
        $('.toggle_search > i').removeClass("fas fa-times").addClass("fas fa-search");
    }
    $('.h-search-form-inner > form > input.search-field').focus();
});

/*--------------------------------------------------
* Partners OwlCarousel Slider
*--------------------------------------------------*/
$('#partners').owlCarousel({
    margin:10,
    loop:true,
    rewind: false,
    autoplay: true, //true if you want enable autoplay
    smartSpeed:3000,
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        481:{
            items:2
        },
        576:{
            items:2
        },
        768:{
            items:3
        },
        992:{
            items:4
        },
        1200:{
            items:4
        },
        1430:{
            items:5
        },
        1600:{
            items:6
        }
    }
});

/*--------------------------------------------------
* Team-Social Icon
*--------------------------------------------------*/
$('.team-social > i.fa-plus').on('click', function(){
    $(this).parent().toggleClass('active');
});

/*--------------------------------------------------
* Lazy Load Img
*--------------------------------------------------*/
/** lazy **/
$(function() {
    $('.lazy').lazy();
});

/*--------------------------------------------------
* Company OwlCarousel Slider
*--------------------------------------------------*/
$('#company').owlCarousel({
    loop:true,
    dots: false,
    nav:true,
    navText: ['<i class="fal fa-long-arrow-left"></i>','<i class="fal fa-long-arrow-right"></i>'],
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})

/*--------------------------------------------------
* Slider2 OwlCarousel Slider
*--------------------------------------------------*/
$('#slider2').owlCarousel({
    margin:0,
    dots: false,
    nav:true,
    loop:true,
    navText: ['<i class="fal fa-long-arrow-left"></i>','<i class="fal fa-long-arrow-right"></i>'],
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1600:{
            items:1
        }
    }
});

/* --------------------------------------------------
* Real Numbers
*--------------------------------------------------*/
$('.real-numbers').each( function(){
    var swt = $('.real-numbers').find('.switch input');
    swt.on( 'change', function() {
        var parent = $(this).parents('.real-numbers');
        if(this.checked) {
            parent.find('.a-switch').addClass('active');
            parent.find('.b-switch').removeClass('active');
            parent.find('h2.after').fadeIn();
            parent.find('h2.before').hide();
        }else{
            parent.find('.b-switch').addClass('active');
            parent.find('.a-switch').removeClass('active');
            parent.find('h2.after').hide();
            parent.find('h2.before').fadeIn();
        }
    });
});

/*--------------------------------------------------
* Popup Video
*--------------------------------------------------*/
var $video_play = $('.btn-play');
if ($video_play.length > 0 ) {
    $video_play.magnificPopup({
        type: 'iframe',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: true,
        callbacks: {
        beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
    });
}

/*--------------------------------------------------
* Team OwlCarousel Slider
*--------------------------------------------------*/
$('#team').owlCarousel({
    margin:30,
    dots: false,
    nav:true,
    loop:true,
    navText: ['<i class="fal fa-long-arrow-left"></i>','<i class="fal fa-long-arrow-right"></i>'],
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        768:{
            items:3
        },
        992:{
            items:3
        },
        1200:{
            items:4
        },
        1430:{
            items:4
        },
        1600:{
            items:4
        }
    }
})

/*--------------------------------------------------
* Product OwlCarousel Slider
*--------------------------------------------------*/
$('#product').owlCarousel({
    margin:30,
    dots: false,
    nav:true,
    loop:true,
    navText: ['<i class="fal fa-long-arrow-left"></i>','<i class="fal fa-long-arrow-right"></i>'],
    rewind: false,
    autoplay: true, //true if you want enable autoplay
    responsiveClass: true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:2
        },
        1200:{
            items:3
        },
        1430:{
            items:3
        },
        1600:{
            items:3
        }
    }
})

/*--------------------------------------------------
* Responsive menu
*--------------------------------------------------*/

function responsiveResize() {
    if ($(window).width() <= 991) {
        $('.navbar-nav li:has(ul)').prepend('<span class="arrow"><i class="fal fa-angle-right"></i></span>');

            $(".navbar-nav > li span.arrow").click(function() {
            $(this).parent().find("> ul").stop(true, true).slideToggle('slow')
            $(this).toggleClass( "active" ); 
        });
    }
}