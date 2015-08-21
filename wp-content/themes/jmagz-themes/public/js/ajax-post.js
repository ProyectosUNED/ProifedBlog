/* ------------------------------------------------------------------------- *
 *  Ajax Script
 * ------------------------------------------------------------------------- */

var $ = jQuery.noConflict();
var current_post_id = jmagzoption.postid;
var sectionwrap = $('.section-wrap');
var ajaxobj = null;

function website_analytic(url) {
    "use strict";
    if(jmagzoption.gacode) {
        _gaq.push(['_trackPageview', url]);
    }
}

function set_side_active (element) {
    "use strict";
    $(".sidebar-post-item").removeClass('active');
    $(element).addClass('active');
}

function set_meta_data(responsehtml) {
    "use strict";
    var title = $(responsehtml).filter("title").text();
    var keyword = $(responsehtml).filter('meta[name=keyword]').attr("content");
    var description = $(responsehtml).filter('meta[name=description]').attr("content");

    $('meta[name=description]').attr('content', description);
    $('meta[name=keyword]').attr('content', keyword);
    document.title = title;
}

function setup_content(responsehtml) {
    "use strict";
    var wrappercontent = $(responsehtml).find('.wrapper');
    sectionwrap.append(wrappercontent);

    /* wait for image before loading
    wrappercontent.waitForImages(function(){
        jmagz_dispatch();
        $(window).trigger('load');
        close_curtain();
    });
    */

    /* jmagz with  */
    jmagz_dispatch();
    close_curtain();
    $(document).trigger('jmagz-ajax-load');
}

function fetch_content(url, postid, nopush) {
    "use strict";
    if(ajaxobj !== null) {
        ajaxobj.abort();
    }

    ajaxobj = $.ajax({
        url: url,
        type: "get",
        dataType: "html",
        success: function (responsehtml) {
            if(!nopush) {
                window.history.pushState({postid:postid},'',url);
            }

            // url
            website_analytic(url);
            set_meta_data(responsehtml);
            setup_content(responsehtml);
        },
        timeout : function() {
            window.location = url;
        }
    });
}

function open_curtain(animspeed) {
    "use strict";
    $(".ajax-overlay").fadeIn(animspeed, function(){
        $('.wrapper').remove();
        sectionwrap.height($(window).height());
    });
}

function close_curtain() {
    "use strict";
    $(".ajax-overlay").fadeOut();
    sectionwrap.css({ 'height' : 'auto' });
}

function jmagz_ajax_dispatch() {
    "use strict";
    $(".sidebar-posts").on('click', 'a.ajax', function(e){
        e.preventDefault();

        var parent = $(this).parents('.sidebar-post-item');
        var parentid = $(parent).data('id');
        var url = $(this).attr('href');


        if(parentid == current_post_id) {
            // do nothing
        } else {
            // if in mobile, then we need to close the drawer
            $('body').removeClass('menu-active').removeClass('push-content-right');

            current_post_id = parentid;
            set_side_active(parent);

            // slide up
            var animspeed = ( $(window).scrollTop() + 400 ) / 4;
            open_curtain(animspeed);
            $('html, body').animate({
                scrollTop: 0
            }, animspeed, function(){
                fetch_content(url, current_post_id, false);
            });
        }
    });
}

function change_active_state_feed(postid) {
    "use strict";
    $(".sidebar-post-item").removeClass('active');
    $(".sidebar-post-item[data-id=" + postid + "]").addClass('active');
}

$(document).ready(function(){
    "use strict";
    if(jmagzoption.isblog && window.history && window.history.pushState){
        jmagz_ajax_dispatch();
    }

    if (window.history.pushState && !jmagzoption.ismobile) {
        $(window).bind('popstate', function(event) {
            var state = event.originalEvent.state;
            var url = location.href;

            current_post_id = state.postid;
            change_active_state_feed(current_post_id);

            // slide up
            var animspeed = ( $(window).scrollTop() + 400 ) / 4;
            open_curtain(animspeed);
            $('html, body').animate({
                scrollTop: 0
            }, animspeed, function(){
                fetch_content(url, current_post_id, true);
            });
        });
    }
});