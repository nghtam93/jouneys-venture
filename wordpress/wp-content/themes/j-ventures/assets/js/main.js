$(document).ready(function(){

    /*----Languages---*/
    $('.languages .languages-item').click(function() {
        $(this).next().toggleClass('dropdown-languages');
        isClicked = true;
    });

    $('.languages ul li').click(function() {
        var $liIndex = $(this).index() + 1;
        $('.languages ul li').removeClass('active');
        $('.languages ul li:nth-child('+$liIndex+')').addClass('active');
        var $getLang = $(this).html();
        $('.languages .languages-item').html($getLang);

        $('.languages>.wpml-ls').removeClass('dropdown-languages')
    });

    // Sticky navbar
    // =========================

    function get_header_height() {
        var header_sticky=$("header.-fix").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement,stickyHeight) {
        var stickyTop = stickyWrapper.offset().top;
        if (scrollElement.scrollTop() > 1 && scrollElement.scrollTop() >= stickyTop ) {
            stickyWrapper.height(stickyHeight);
            sticky.addClass("is-sticky");
        }
        else {
            sticky.removeClass("is-sticky");
            stickyWrapper.height('auto');
        }
    };
    $('[data-toggle="sticky-onscroll"]').each(function () {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');
        var stickyHeight = sticky.outerHeight();
        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
            stickyToggle(sticky, stickyWrapper, $(this),stickyHeight);
        });

        // On page load
        stickyToggle(sticky, stickyWrapper, $(window),stickyHeight);
        // Check scroll top
        var winSt_t = 0;
        $(window).scroll(function() {
            var winSt = $(window).scrollTop();
            if (winSt >= winSt_t) {
                sticky.removeClass("top_show")
            } else {
                sticky.addClass("top_show")
            }
            winSt_t = winSt
        });
    });



    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $('.nav__mobile--close').click(function(e){
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('modal-open')
    });
    $('.menu-mb__btn').click(function(e){
        e.preventDefault()
        if($('body').hasClass('modal-open')){
            $('.menu-mb__btn').removeClass('active')
            $('.nav__mobile').removeClass('active')
            $('body').removeClass('modal-open')
        }else{
            $('.menu-mb__btn').addClass('active')
            $('body').addClass('modal-open')
            $('.nav__mobile').addClass('active')
        }
    });

    //back to top
    var back_to_top=$(".back-to-top"),offset=220,duration=500;
    $(document).on("click",".back-to-top",function(o){
        return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1
    });

    //check home
    if($('body').hasClass( "home" )){
        new WOW().init();
    }

    if($('div').hasClass('counter')){
        $('.counter').counterUp({
            delay: 50,
            time: 3000
        });
    }



    $('.about-partners-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        easing: "linear",
        prevArrow: '<span class="icon-arrow-left slick-prev slick-arrow"></span>',
        nextArrow: '<span class="icon-arrow-right slick-next slick-arrow"></span>',
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                // centerMode: true,
                variableWidth: true
              }
            }
        ]
    });


    var offset = 12; // khái báo số lượng bài viết đã hiển thị
    $('.js-loadmore').click(function(event) {
        var thiz = $(this)
        event.preventDefault()
        thiz.addClass('active')
        var catid = thiz.data('catid')
        $.ajax({ // Hàm ajax
            url : dntheme_params['ajax_url'], // Nơi xử lý dữ liệu
            data : {
                action: "loadmore", //Tên action, dữ liệu gởi lên cho server
                catid: catid, //Tên action, dữ liệu gởi lên cho server
                offset: offset, // gởi số lượng bài viết đã hiển thị cho server
            },
            beforeSend: function(){

            },
            success: function(response) {

                if(response){
                    $('.js-loadcontent').append(response);
                    offset = offset + 12;
                }else{
                    thiz.remove()
                }

                if(thiz.data('number') == 0){
                    thiz.remove()
                }

                thiz.removeClass('active')

                thiz.attr("data-number",$('.js-loadmore-stt').val());
                if(thiz.attr('data-number') == 0){
                    thiz.remove()
                }
                $('.js-loadmore-stt').remove()
            },

            error: function( jqXHR, textStatus, errorThrown ){
                //Làm gì đó khi có lỗi xảy ra
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
       });
    });

});


