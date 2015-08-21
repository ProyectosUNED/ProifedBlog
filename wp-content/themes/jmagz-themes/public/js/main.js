/* ------------------------------------------------------------------------- *
 *  Main Script
 * ------------------------------------------------------------------------- */

var $ = jQuery.noConflict();

/** map **/
$.fn.jrmap = function () {
    "use strict";
    return $(this).each(function () {
        var element = this;
        var content = $(element).find('.contenthidden').html();
        var options = {
            lat: $(element).data('lat'),
            lng: $(element).data('lng'),
            zoom: $(element).data('zoom'),
            ratio: $(element).data('ratio'),
            showpopup: $(element).data('showpopup'),
            title: $(element).data('title')
        };

        var mapresize = function () {
            var elewidth = $(element).width();
            $(element).height(elewidth * options.ratio);
        };

        var createmap = function () {

            var eleid = $(element).attr('id');
            var mapOptions = {
                zoom: parseInt(options.zoom, 10),
                center: new google.maps.LatLng(parseFloat(options.lat), parseFloat(options.lng)),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoomControl: true,
                scaleControl: false,
                panControl: false,
                scrollwheel: false
            };
            var map = new google.maps.Map(document.getElementById(eleid), mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(options.lat), parseFloat(options.lng)),
                map: map,
                zIndex: 10,
                title: options.title
            });


            if (options.showpopup === true) {

                var contentString = '<div id="mapcontent">' +
                    '<h3>' + options.title + '</h3>' +
                    '<div id="bodyContent">' +
                    content +
                    '</div>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 300
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                window.setTimeout(function () {
                    infowindow.open(map, marker);
                }, 5000);
            }

        };

        $(window).bind('resize', mapresize);
        mapresize();
        google.maps.event.addDomListener(window, 'load', createmap);
        createmap();
    });
};

/** jskill plugin **/
$.fn.jskill = function () {
    "use strict";
    return $(this).each(function () {
        var element = $(this);

        window.setTimeout(function () {
            element.waypoint(function (direction) {
                var progressbar = $(this).find('.bar-bg');

                element.addClass('show');

                $(progressbar).each(function (i) {
                    var ele = $(this);

                    window.setTimeout(function () {
                        var width = $(ele).attr('data-width') + '%';
                        $(ele).css('width', width);
                    }, 250 * i);
                });
            }, {
                offset: '80%',
                triggerOnce: true,
                context: window
            });
        }, 1000);
    });
};

/** Jeg OwlGallery plugin **/
$.fn.jowlgallery = function (options) {
    "use strict";
    var setting = {
        items : 7,
        itemsDesktop      : [1000,6],
        itemsDesktopSmall : [900,6],
        itemsTablet       : [1024,6],
        itemsMobile       : [320,4],
        slideSpeed : 500,
        autoPlay : true,
        navigation : false,
        thumbnail : '.gallery-slider-thumbnail',
        theme     : 'owl-jowlgallery',
        thumbnail_theme : 'owl-jowlgallerythumbnail',
        zoom: true
    };

    if (options) {
        options = $.extend(setting, options);
    } else {
        options = $.extend(setting);
    }

    var slider = this;
    var thumbnail = $(options.thumbnail);

    function featuredSliderCenter(number){
        var thumbVisible = thumbnail.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for(var i in thumbVisible){
            if(num === thumbVisible[i]){
                found = true;
            }
        }

        if(found===false){
            if(num>thumbVisible[thumbVisible.length-1]){
                thumbnail.trigger("owl.goTo", num - thumbVisible.length+2);
            }else{
                if(num - 1 === -1){
                    num = 0;
                }
                thumbnail.trigger("owl.goTo", num);
            }
        } else if(num === thumbVisible[thumbVisible.length-1]){
            thumbnail.trigger("owl.goTo", thumbVisible[1]);
        } else if(num === thumbVisible[0]){
            thumbnail.trigger("owl.goTo", num-1);
        }
    }

    function featuredSliderCenterSync(el){
        var current = this.currentItem;
        thumbnail
          .find(".owl-item")
          .removeClass("active")
          .eq(current)
          .addClass("active");
        if(thumbnail.data("owlCarousel") !== undefined){
          featuredSliderCenter(current);
        }
    }

    if (slider.length >= 1) {
        slider.owlCarousel({
            slideSpeed : options.slideSpeed,
            paginationSpeed : 400,
            addClassActive : true,
            navigation : options.navigation,
            navigationText : false,
            pagination : false,
            singleItem:true,
            autoPlay: options.autoPlay,
            afterAction : featuredSliderCenterSync,
            responsiveRefreshRate : 200,
            theme : options.theme,
            lazyLoad: true,
            mouseScroll : false
        });

        thumbnail.owlCarousel({
            items : options.items,
            itemsDesktop      : options.itemsDesktop,
            itemsDesktopSmall : options.itemsDesktopSmall,
            itemsTablet       : options.itemsTablet,
            itemsMobile       : options.itemsMobile,
            pagination        : false,
            responsiveRefreshRate : 100,
            theme : options.thumbnail_theme,
            lazyLoad: true,
            afterInit : function(el){
              el.find(".owl-item").eq(0).addClass("active");
            }
        });

        if (options.mouseScroll) {
            thumbnail.on('mousewheel', '.owl-wrapper', function (e) {
                if (e.deltaY > 0) {
                    thumbnail.trigger('owl.next');
                } else {
                    thumbnail.trigger('owl.prev');
                }
                e.preventDefault();
            });
        }

        $('.owl-wrapper', slider).each(function() {
            if(options.zoom) {
                $.magnificPopup.instance.next = function() {
                    $(this.st.galleryslider).trigger('owl.next');
                    $.magnificPopup.proto.next.call(this);
                };

                $.magnificPopup.instance.prev = function() {
                    $(this.st.galleryslider).trigger('owl.prev');
                    $.magnificPopup.proto.prev.call(this);
                };

                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    zoom: {
                        enabled:true
                    },
                    gallery: {
                        enabled:true
                    },
                    image: {
                        titleSrc: function(item) {
                            var slideCaption = $(item.el).next().text();
                            return slideCaption;
                        },
                        verticalFit: true
                    },
                    galleryslider: slider
                });
            }
        });

        thumbnail.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).data("owlItem");
            slider.trigger("owl.goTo",number);
        });
    }
};

function image_zoom() {
    if(jmagzoption.usezoom) {

        $(".article-content a > img[class*=' wp-image-']").each(function(){
            var element = $(this).parent();
            $(element).magnificPopup({
                type:'image',
                zoom: {
                    enabled:true
                },
                image: {
                    titleSrc: function(item) {
                        return $(item.el).find('img').attr('alt');
                    },
                    verticalFit: true
                }
            });
        });

        $(".gallery").magnificPopup({
            delegate: 'a',
            type: 'image',
            zoom: {
                enabled:true
            },
            gallery: {
                enabled:true
            },
            image: {
                titleSrc: function(item) {
                    return $(item.el).find('img').attr('alt');
                },
                verticalFit: true
            }
        });
    }
}

/***************************
 * Carousel Post & Gallery
 **************************/

function breaking_news_carousel () {
    "use strict";
    // Breaking News: Carousel
    $(".breakingnews-carousel").owlCarousel({
        itemsCustom : [
            [0, 1],
            [768, 2],
            [1024, 3],
            [1400, 4],
            [1600, 5]
        ],
        slideSpeed: 200,
        navigation : true,
        pagination : false,
        navigationText : false,
        autoPlay: true,
        lazyLoad: true,
        theme : 'owl-breakingnews'
    });

    // Breaking News: Marquee
    $('.breakingnews-marquee ul').marquee({
        duration: 10000,
        pauseOnHover: true
    });
}

function carousel_element() {
    "use strict";
    // Carousel Post

    $(".carousel-post").each(function(){
        var number = $(this).data('width');
        $(this).owlCarousel({
            itemsCustom : [
                [0, 1],
                [768, 2],
                [1024, 3],
                [1400, number],
                [1600, number]
            ],
            navigation : true,
            pagination : false,
            navigationText : false,
            autoPlay: true,
            lazyLoad: true,
            autoHeight : true,
            theme : 'owl-carouselpost'
        });
    });

    // Carousel Postbox
    $(".postbox").owlCarousel({
        itemsCustom : [
            [0, 1],
            [768, 2],
            [1024, 3],
            [1400, 3],
            [1600, 3]
        ],
        navigation : true,
        pagination : false,
        navigationText : false,
        autoPlay: true,
        lazyLoad: true,
        autoHeight : true,
        theme : 'owl-carouselpost'
    });

    // Single Post Featured Gallery
    $(".featured-gallery").jowlgallery({
        navigation : true,
        navigationText : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: false,
        theme : 'owl-carouselpost',
        zoom: true
    });

    // gallery slider
    $('.gallery-slider').jowlgallery({
        thumbnail: '.gallery-slider-thumbnail',
        navigation: true,
        autoPlay: false,
        mouseScroll: false,
        zoom: true
    });
}

/***************************
 * Reviews Search Toggle
 **************************/
function review_search() {
    "use strict";
    $(".search-bar-wrapper .searchkeyword").bind('click', function(){
        $(".filter-toggle i").removeClass('fa-th-large').addClass('fa-close');
        $('.search-filter-wrapper').slideDown();
    });
    $(".filter-toggle i").bind('click', function(){
        var element = this;
        if($(this).hasClass('fa-th-large')) {
            $(".filter-toggle i").removeClass('fa-th-large').addClass('fa-close');
            $('.search-filter-wrapper').slideDown();
        } else {
            $(".filter-toggle i").removeClass('fa-close').addClass('fa-th-large');
            $('.search-filter-wrapper').slideUp();
        }
    });
}

/***************************
 * menu category hover
 **************************/
var category_xhr = null;
function menu_category_hover_exe(element, loadanimation) {
    "use strict";
    var container = $(element).parents('.newsfeed');
    var postcontainer = $(container).find('.newsfeed-posts');
    var overlay = $(container).find(".newsfeed-overlay");
    var categoryid = $(element).data('menu-category-id');

    var currentcontainer = $(postcontainer).find(".newsfeed-container[data-content-category-id='" + categoryid + "']");

    $(container).find('.newsfeed-categories li').removeClass('active');
    $(element).addClass('active');

    if($(currentcontainer).length < 1) {
        // ajax request
        var action = 'get_mega_category_item';
        if($(element).hasClass('review-menu')) {
            action = 'get_mega_review_item';
        }

        $(overlay).stop().fadeIn("fast");

        if(category_xhr !== null) {
            category_xhr.abort();
        }
        category_xhr = $.ajax({
            url: jmagzoption.ajaxurl,
            type: "post",
            dataType: "html",
            data: {
                'categoryid' : categoryid,
                'action' : action
            },
            success: function (data) {
                $(postcontainer).css('height',$(postcontainer).height())
                    .find('.newsfeed-container')
                    .hide();
                $(postcontainer).append(data);

                currentcontainer = $(postcontainer).find(".newsfeed-container[data-content-category-id='" + categoryid + "']");
                menu_category_carousel(currentcontainer);
                $(overlay).stop().fadeOut(function(){
                    $(postcontainer).css('height','');
                });

            }
        });
    } else {
        if(loadanimation) {
            // load available content
            $(postcontainer).css('height',$(postcontainer).height())
                .find('.newsfeed-container')
                .hide();

            $(overlay).stop().fadeOut(function(){
                $(currentcontainer).fadeIn();
                $(postcontainer).css('height','');
            });
        }
    }

}

function menu_category() {
    "use strict";
    // first menu
    menu_category_carousel($(".newsfeed-container"));

    // menu category
    $(".newsfeed-categories li").bind('mouseenter', function(){
        menu_category_hover_exe(this, true);
    });
}

function menu_category_carousel(element){
    "use strict";
    $(element).owlCarousel({
        navigation : false,
        pagination : true,
        navigationText : false,
        lazyLoad : true
    });
}

/** handle navigation scroll bar **/
function navigation_scrollbar ()
{
    "use strict";
    var $sidebarwrapper = $(".sidebar-posts");
    if ($sidebarwrapper.length) {
        $sidebarwrapper.jScrollPane({
            mouseWheelSpeed: 50,
            contentWidth: '0px'
        });
        var navscrolpane = $sidebarwrapper.data('jsp');

        var calculate_sidebar_size = function () {
            $sidebarwrapper.css('height', $(window).height() - $('.sidebar-footer').height());
            navscrolpane.reinitialise();
        };

        $(window).bind('resize load', calculate_sidebar_size);
        $(".sidebar-post-wrapper").mutate('height', calculate_sidebar_size);
    }
}


/** related post popup **/
function popup_post() {
    "use strict";
    var popupflag = $('#end-content');
    var popup = $('.popup-post');

    popupflag.waypoint(function (direction) {
        if(direction == 'up'){
            popup.removeClass('active');
        } else {
            popup.addClass('active');
        }
    }, {
        offset: '100%',
        context: window
    });

    $('.popup-close').click(function(e) {
        e.preventDefault();
        popup.removeClass('active');
    });
}

/** sticky sidebar **/
function sticky_sidebar() {
    "use strict";
    if ($('#sidebar').length > 0) {
        var sidebar_top = $('#sidebar').offset().top;
        var do_sticky_sidebar = function(){
            if($(window).width() > 1200) {
                var toppos = $(window).scrollTop();
                $('#sidebar')[toppos > sidebar_top ? 'addClass' : 'removeClass']('fixed');
            }
        };

        if($(window).width() > 1200) {
            do_sticky_sidebar();
            $(window).bind('scroll', do_sticky_sidebar);
        } else {
            $('#sidebar').removeClass('fixed');
            $(window).unbind('scroll', do_sticky_sidebar);
        }
    }
}

/** sticky share bar **/
function sticky_share()
{
    "use strict";
    var sharerbar = $('.article-sharer');
    var dummyblock = $('.dummy-share-block');
    var sharetop = 0;

    var sticky_share_bar = function()
    {
        var toppos = $(window).scrollTop();

        if (toppos > sharetop) {
            if ($('.article-sharer-placeholder').length > 0) $('<div class="article-sharer-placeholder"></div>').insertBefore(sharerbar);
            sharerbar.addClass('fixed');
            dummyblock.addClass('fixed');
        } else {
            $('.article-sharer-placeholder').remove();
            sharerbar.removeClass('fixed');
            dummyblock.removeClass('fixed');
        }
    };

    var setup_sticky_variable = function()
    {
        if($(window).width() > 1024 && $(sharerbar).length) {

            /* normalize sticky variable **/
            $('.article-sharer-placeholder').remove();
            sharerbar.removeClass('fixed');
            sharetop = Math.floor(sharerbar.offset().top);
            sticky_share_bar();

            $(window)
                .unbind('scroll', sticky_share_bar)
                .bind('scroll', sticky_share_bar);
        } else {
            $(window).unbind('scroll', sticky_share_bar);
        }
    };

    setup_sticky_variable();
    $(window).bind('resize', setup_sticky_variable);
    $('#content').mutate('height', setup_sticky_variable);
}

/** top search **/

function search_toggle(){
    "use strict";

    var search_xhr = null;
    var searchtimeout = null;

    var searchresult = $(".top-search .search-result");
    var searchwrapper = $(".top-search .search-result-wrapper");
    var searchnoresult = $(".top-search .search-noresult");
    var searchbutton = $(".top-search .search-all-button");

    var loadingclass = $(".top-search button i").data('loading');
    var normalclass = $(".top-search button i").data('normal');
    var topsearchbutton = $(".top-search button i");

    function no_data() {
        searchnoresult.show();
        searchwrapper.hide();
        searchbutton.hide();
    }

    function data_exist() {
        searchnoresult.hide();
        searchwrapper.show();
        searchbutton.show();
    }

    function do_live_search(word) {
        clearTimeout(searchtimeout);
        searchtimeout = setTimeout(function(){
            if(search_xhr !== null) {
                search_xhr.abort();
            }

            topsearchbutton.attr('class', loadingclass);
            search_xhr = $.ajax({
                url: jmagzoption.ajaxurl,
                type: "post",
                dataType: "html",
                data: {
                    's' : word,
                    'action' : 'get_ajax_live_search'
                },
                success: function (data) {

                    topsearchbutton.attr('class', normalclass);
                    if(data === ''){
                        no_data();
                    } else {
                        searchwrapper.html('').append(data);
                        data_exist();
                    }
                    $(searchresult).show();
                }
            });
        }, 200);
    }

    var cacheword = '';
    $(".top-search [name='s']").bind('keyup', function(){
        var searchword = $(this).val();
        if(searchword.trim().length >= 3 && searchword !== cacheword) {
            do_live_search(searchword);
            cacheword = searchword;
        } else if(searchword.trim().length < 3) {
            searchresult.hide();
        }
    });

    $(searchbutton).bind('click',function(){
        $(".top-search form").submit();
    });

    $('.top-search-toggle').click(function(){
        $('.top-search-toggle, .top-socials, .right-menu').hide();
        $('.top-search .search-form').fadeIn();
        $('.top-search').removeClass('no-active').addClass('active');

        return false;
    });

    $(document).mouseup(function(e) {
        if (!$(e.target).parents('.top-search .search-form').length > 0) {
            $('.top-search .search-form').hide();
            $('.top-search-toggle, .top-socials, .right-menu').fadeIn();
            $('.top-search').removeClass('active').addClass('no-active');
        }
    });
}

/** mobile menu **/
function mobile_menu() {
    "use strict";
    /** menu open **/
    $('.sidebar-toggle').click(function () {
        $('body').toggleClass('menu-active push-content-right');
    });
    $('.menu-toggle').click(function () {
        console.log('menu show');
        $('#mobile-menu').toggleClass('active');
        $('body').toggleClass('menu-active push-content-left');
    });

    /** menu close **/

    function mobile_sidebar_close(e) {
        // Mobile Sidebar Close
        if ($('body').hasClass('push-content-right') && !$(e.target).parents('#sidebar').length > 0) {
            $('body').removeClass('menu-active push-content-right');
        }
        // Mobile Menu Close
        if ($('#mobile-menu').hasClass('active') && !$(e.target).parents('#mobile-menu').length > 0) {
            $('#mobile-menu').removeClass('active');
            $('body').removeClass('menu-active push-content-left');
        }
    }

    $(document).mouseup(function (e) {
        mobile_sidebar_close(e);
    });
    $('body').bind("touchend", function (e) {
        mobile_sidebar_close(e);
    });
}

/** navigation menu **/
function navigation_menu () {
    "use strict";
    var loadnewsfeed = function() {
        var parent = $(this).parent();
        if($(parent).hasClass('mega-menu')) {
            var currentactive = $(".newsfeed-categories > li.active", this);
            menu_category_hover_exe(currentactive, false);
        }
    };

    $('header ul.menu').superfish({
        popUpSelector: 'ul,.sub-menu',
        animation: {height:'show', opacity:'show'},
        onShow: loadnewsfeed
    });
}

/** Multimedia Embed **/
$.youtube_parser = function (url) {
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[7].length === 11) {
        return match[7];
    }
    /*jshint latedef: true */
    window.alert("Url Incorrect");
};

$.vimeo_parser = function (url) {
    "use strict";
    var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
    var match = url.match(regExp);

    if (match) {
        return match[2];
    }

    // check if using https
    regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
    match = url.match(regExp);

    if (match) {
        return match[2];
    }

    /*jshint latedef: true */
    window.alert("not a vimeo url");
};

$.type_video_youtube = function (ele, autoplay, repeat) {
    "use strict";
    var youtube_id = $.youtube_parser($(ele).attr('data-src'));
    var additionalstring = '';
    var iframe = '';
    if(repeat) {
        additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
        additionalstring += (repeat === true ) ? "loop=1&playlist=" + youtube_id : "";
        iframe = '<iframe width="700" height="500" src="http://www.youtube.com/v/' + youtube_id + '?version=3&' + additionalstring + 'showinfo=1&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
    } else {
        additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
        iframe = '<iframe width="700" height="500" src="http://www.youtube.com/embed/' + youtube_id + '?' + additionalstring + 'showinfo=1&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
    }
    $('.video-container', ele).append(iframe);
};

$.type_video_vimeo = function (ele, autoplay, repeat) {
    "use strict";
    var vimeo_id = $.vimeo_parser($(ele).attr('data-src'));
    var additionalstring = '';
    additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
    additionalstring += (repeat === true ) ? "loop=1&" : "";
    var iframe = '<iframe src="http://player.vimeo.com/video/' + vimeo_id + '?' + additionalstring + 'title=0&byline=0&portrait=0" width="700" height="500" webkitallowfullscreen mozallowfullscreen frameborder="0"></iframe>';
    $('.video-container', ele).append(iframe);
};

$.type_soundcloud = function (ele) {
    "use strict";
    var soundcloudurl = $(ele).attr('data-src');
    var iframe = '<iframe src="https://w.soundcloud.com/player/?url=' + encodeURIComponent(soundcloudurl) + '" width="700" height="500" frameborder="0"></iframe>';
    $('.video-container', ele).append(iframe);
};

$.type_audio = function(ele){
    "use strict";
    var musicmp3 = '';
    var musicogg = '';

    if ($(ele).data('mp3') !== '') {
        musicmp3 = "<source type='audio/mpeg' src='" + $(ele).data('mp3') + "' />";
    }

    if ($(ele).data('ogg') !== '') {
        musicogg = "<source type='audio/ogg' src='" + $(ele).data('ogg') + "' />";
    }

    var audio =
        "<audio preload='none' style='width: 100%; visibility: hidden;' controls='controls'>" +
        musicmp3 + musicogg +
        "</audio>";

    $(ele).append(audio);


    var settings = {};

    if ( typeof _wpmejsSettings !== 'undefined' ) {
        settings = _wpmejsSettings;
    }

    settings.success = function (mejs) {
        var autoplay, loop;

        if ( 'flash' === mejs.pluginType ) {
            autoplay = mejs.attributes.autoplay && 'false' !== mejs.attributes.autoplay;
            loop = mejs.attributes.loop && 'false' !== mejs.attributes.loop;

            autoplay && mejs.addEventListener( 'canplay', function () {
                mejs.play();
            }, false );

            loop && mejs.addEventListener( 'ended', function () {
                mejs.play();
            }, false );
        }
    };

    $(ele).find('audio').mediaelementplayer( settings );
};

$.type_video_html5 = function (ele, autoplay, options, container) {
    "use strict";
    var cover = $(ele).data('cover');

    options.pauseOtherPlayers = false;

    var videomp4 = '';
    var videowebm = '';
    var videoogg = '';

    var themesurl = '';

    if ($(ele).data('mp4') !== '') {
        videomp4 = "<source type='video/mp4' src='" + $(ele).data('mp4') + "' />";
    }

    if ($(ele).data('webm') !== '') {
        videowebm = "<source type='video/webm' src='" + $(ele).data('webm') + "' />";
    }

    if ($(ele).data('ogg') !== '') {
        videoogg = "<source type='video/ogg' src='" + $(ele).data('ogg') + "' />";
    }

    var preload = autoplay ? "preload='auto'" : "preload='none'";
    var object = "<object width='100%' height='100%' type='application/x-shockwave-flash' data='" + themesurl + "/public/mediaelementjs/flashmediaelement.swf'>" +
        "<param name='movie' value='" + themesurl + "/public/mediaelementjs/flashmediaelement.swf' />" +
        "<param name='flashvars' value='controls=true&file=" + $(ele).data('mp4') + "' />" +
        "<img src='" + cover + "' alt='No video playback capabilities' title='No video playback capabilities' />" +
        "</object>";
    var iframe = "<video id='player' style='width:100%;height:100%;' width='100%' height='100%' poster='" + cover + "' controls='controls' " + preload + ">" +
        videomp4 + videowebm + videoogg + object +
        "</video>";

    $(container, ele).append(iframe);
    if (autoplay) {
        options.success = function (mediaElement) {
            if (mediaElement.pluginType === 'flash') {
                mediaElement.addEventListener('canplay', function () {
                    mediaElement.play();
                }, false);
            } else {
                mediaElement.play();
            }
        };
    }

    $(ele).find('video').mediaelementplayer(options);
};

function do_media_render(){
    "use strict";
    // youtube
    if ($("[data-type='youtube']").length) {
        $("[data-type='youtube']").each(function () {
            var autoplay = $(this).data('autoplay');
            var repeat = $(this).data('repeat');
            $.type_video_youtube($(this), autoplay, repeat);
        });
    }

    // vimeo
    if ($("[data-type='vimeo']").length) {
        $("[data-type='vimeo']").each(function () {
            var autoplay = $(this).data('autoplay');
            var repeat = $(this).data('repeat');
            $.type_video_vimeo($(this), autoplay, repeat);
        });
    }

    // sound cloud
    if ($("[data-type='soundcloud']").length) {
        $("[data-type='soundcloud']").each(function () {
            $.type_soundcloud($(this));
        });
    }

    // audio
    if ($("[data-type='audio']").length) {
        $("[data-type='audio']").each(function () {
            $.type_audio($(this));
        });
    }

    // html 5 video
    if($("video").length) {
        $('video').mediaelementplayer();
    }
}

function pin_it_image() {
    "use strict";
    $("img").attr("data-pin-no-hover", true);
    $(".article-content img, .featured img").removeAttr("data-pin-no-hover");
}

function sidebar_loading() {
    "use strict";
    var buttonloadmore = $(".sidebar-loadmore");
    var currentcontainer = $(".sidebar-post-wrapper");

    var btnstrong = $(buttonloadmore).find('strong');
    var btni = $(buttonloadmore).find('i');
    var loadmoredata = null;

    var loadmoretext = $(buttonloadmore).data('loadmore');
    var loadingtext = $(buttonloadmore).data('loading');
    var btnendtext = $(buttonloadmore).data('end');

    $(buttonloadmore).bind('click', function(e){
        e.preventDefault();

        if(!$(buttonloadmore).hasClass('active')) {

            // lock
            $(buttonloadmore).addClass('active');
            $(btnstrong).text(loadingtext);
            $(btni).addClass('fa-spin');

            if($(buttonloadmore).hasClass('sidebar-loadmore-review')) {
                loadmoredata = {
                    'page' : $(buttonloadmore).data('page') + 1,
                    'action' : 'get_sidebar_review',
                    'isblog' : jmagzoption.isblog,
                    'postid' : jmagzoption.postid
                };
            } else {
                loadmoredata = {
                    'page' : $(buttonloadmore).data('page') + 1,
                    'action' : 'get_sidebar_feed',
                    'isblog' : jmagzoption.isblog,
                    'postid' : jmagzoption.postid
                };
            }

            $.ajax({
                url: jmagzoption.ajaxurl,
                type: "post",
                dataType: "html",
                data: loadmoredata,
                success: function (data) {
                    if(data !== '') {
                        $(currentcontainer).append(data);

                        // unlock
                        $(btnstrong).text(loadmoretext);
                        $(btni).removeClass('fa-spin');
                        $(buttonloadmore).removeClass('active');

                        $(buttonloadmore).data('page', $(buttonloadmore).data('page') + 1);
                    } else {
                        $(btni).remove();
                        $(btnstrong).text(btnendtext);
                    }

                    $("#sidebar img.unveil").unveil(0, function() {
                        $(this).load(function() {
                            this.style.opacity = 1;
                        });
                    });
                }
            });
        }
    });
}

function copy_clipboard() {
    "use strict";
    var client = new ZeroClipboard( document.getElementById("shorturl") );

    client.on( "ready", function( readyEvent ) {
        client.on( "aftercopy", function( event ) {
            alert(jmagzoption.copyclipboard);
        } );
    } );
}

function open_share() {
    "use strict";
    $(".socials-share > a").each(function(){
        $(this).bind('click', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var social = $(this).data('shareto');
            window.open(url, jmagzoption.shareto , "height=300,width=600");
        });
    });
}

function home_slider() {
    "use strict";
    /** Home Slider **/
    $('.featured-slider').jowlgallery({
        items: 5,
        thumbnail: '.featured-slider-thumbnail',
        theme: 'owl-featuredslider',
        thumbnail_theme: 'owl-featuredthumbnail',
        zoom: false
    });

    $('.featured-slider-2').jowlgallery({
        items: 4,
        itemsDesktop      : [1000,4],
        itemsDesktopSmall : [900,3],
        itemsTablet       : [1024,3],
        itemsMobile       : [320,2],
        thumbnail: '.featured-slider-2-thumbnail',
        theme: 'owl-featuredslider',
        thumbnail_theme: 'owl-featuredthumbnail',
        lazyLoad: true,
        zoom: false
    });
}

function post_tooltip() {
    "use strict";
    if ($("[data-toggle='tooltip']").length) {
        $("[data-toggle='tooltip']").tooltip();
    }
}

function map_shortcode() {
    "use strict";
    /** map shortcode **/
    if ($(".jrmap").length) {
        do_load_googlemap('mapshortcode');
    }
}

function close_alert() {
    "use strict";
    $(".alert .close").bind('click', function(){
        var parent = $(this).parents('.alert');
        $(parent).fadeOut(500,function(){
            $(this).remove();
        });
    });
}

var blog_facebook_widget = function(){
    "use strict";
    try {
        FB.XFBML.parse();
    } catch (ex) { }
};

var tweetticker = function () {
    "use strict";
    $('.jeg-tweets').each(function () {
        var element = $(this),
            $tweet = null,
            $next = null;
        $(element).height($(element).find('li:first').outerHeight());

        window.setInterval(function () {
            $tweet = $(element).find('li:first');
            $next = $tweet.next();

            $(element).animate({height: ($next.outerHeight()) + 'px'}, 800);
            $tweet.animate({marginTop: '-' + $tweet.outerHeight() + 'px'}, 400, function () {
                $(this).detach().appendTo($(element).find('ul')).removeAttr('style');
            });
        }, 4000);
    });
};


function load_comment_script() {
    "use strict";
    if(jmagzoption.commentscript == 'facebook') {
        var appid = jmagzoption.fbapps ? "&appId=" + jmagzoption.fbapps : "";
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0" + appid;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    } else if(jmagzoption.commentscript == 'disqus') {
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + jmagzoption.disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    }
}

function do_comment_script() {
    "use strict";
    if(jmagzoption.commentscript === 'facebook') {
        FB.XFBML.parse();
    } else if(jmagzoption.commentscript === 'disqus') {
        DISQUS.reset({
            reload: true
        });
    }
}

var do_add_to_cart = function() {
    $.ajax({
        url: jmagzoption.ajaxurl,
        type: "post",
        dataType: "html",
        data: {
            'action' : 'get_ajax_add_cart'
        },
        success: function (data) {
            $(".topcart").html('').append(data);
        }
    });
};

function bind_add_to_cart() {
    "use strict";

    $('body').bind('added_to_cart', do_add_to_cart);
}

function videolistloader(){
    $(".video-wrapper-list > a").bind('click', function(){
        var id = $(this).data('id');
        var action = 'get_video_single';
        var parent = $(this).parent();
        var grandparent = $(parent).parent();
        var element = this;

        $(parent).find('a').removeClass('active');
        $(element).addClass('active');

        $.ajax({
            url: jmagzoption.ajaxurl,
            type: "post",
            dataType: "html",
            data: {
                'postid' : id,
                'action' : action
            },
            success: function (data) {
                $(grandparent).find('.video-wrapper-content').html('').append(data);
                if($(data).data('type') === 'youtube') {
                    $.type_video_youtube($(grandparent).find('.video-wrapper-content > div'), true, false);
                } else if($(data).data('type') === 'vimeo') {
                    $.type_video_vimeo($(grandparent).find('.video-wrapper-content > div'), true, false);
                } else if($(data).prop('tagName') === 'VIDEO'){
                    $(grandparent).find('video').mediaelementplayer();
                }

            }
        });

        return false;
    });
}

function image_unveil() {
    "use strict";
    $("img.unveil").unveil(0, function() {
        $(this).load(function() {
            this.style.opacity = 1;
        });
    });
}

var execute_once = true;

function jmagz_dispatch(){
    "use strict";

    if(execute_once) {
        /** sticky sidebar **/
        sticky_sidebar();
        $(window).bind('resize', sticky_sidebar);

        /** handle navigation scroll bar **/
        navigation_scrollbar();

        /** handle menu **/
        navigation_menu();

        /** Menu Category Hover **/
        menu_category();

        /** Home Slider **/
        home_slider();

        /** search toogle **/
        search_toggle();

        /** mobile menu **/
        mobile_menu();

        /** sidebar loading **/
        sidebar_loading();

        /** breaking news carousel **/
        breaking_news_carousel();

        /** load comment script **/
        load_comment_script();

        execute_once = false;

        /** bind add to cart **/
        bind_add_to_cart();

    } else {

        /** execute map shortcode **/
        mapshortcode();

        /** do comment script **/
        do_comment_script();
    }

    /** Carousel Post & Gallery **/
    carousel_element();

    /** review bar animation **/
    $('.review-bars').jskill();

    // Reviews Search
    review_search();

    // jQuery Select
    $("select:visible, .search-filter-wrapper select").chosen({
        disable_search_threshold: 10,
        allow_single_deselect: true
    });

    /** image **/
    image_zoom();

    /** sticky share **/
    sticky_share();

    /** related post popup **/
    popup_post();

    /** media render **/
    do_media_render();

    /** add pin it on image hover **/
    pin_it_image();

    /** copy clipboard **/
    if(jmagzoption.isie != true) {
        copy_clipboard();
    }

    /** open share **/
    open_share();

    /** post tooltips **/
    post_tooltip();

    /** execute map shortcode **/
    map_shortcode();

    /** close allert **/
    close_alert();

    /** facebook widget **/
    blog_facebook_widget();

    /** twitter ticker **/
    tweetticker();

    /** video list loader **/
    videolistloader();

    /** jmagz unveil **/
    image_unveil();

    /** reload cart **/
    do_add_to_cart();
}

$(document).ready(jmagz_dispatch);
$(document).bind('jmagz-ajax-load ready', function(){});

/**
 * google map load
 **/
Array.prototype.unique = function() {
    var a = this;
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }
    return a;
};

var mapenqueued = false;
var functionarray = [];

function do_load_googlemap(cb) {
    if(!mapenqueued) {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
        'callback=executemapcallback';
        document.body.appendChild(script);
        mapenqueued = true;
    }
    functionarray.push(cb);
}

function executemapcallback() {
    functionarray  = functionarray.unique();
    for(var i = 0; i < functionarray.length; i++) {
        window[functionarray[i]]();
    }
}

/** need to use asynch map and loaded only when it needed **/
function mapshortcode() {
    $(".jrmap").jrmap();
}