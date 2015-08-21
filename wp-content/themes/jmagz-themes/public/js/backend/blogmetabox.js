(function($){
    $('document').ready(function(){

        var get_blog_format = function(){
            var format = '';
            if( $("#post-formats-select input:checked").length > 0 ) {
                return $("#post-formats-select input:checked").val();
            }
            return format;
        };

        var reset_show_hide_element = function()
        {
            $("#normal-sortables > div").each(function(){
                $(this).attr('style', '');
            });
        };

        var showhide_format_element = function(format) {
            reset_show_hide_element();

            if(format === 'video') {
                $("#jmagz_blog_video_metabox").show();
            } else if(format === 'gallery') {
                $("#jmagz_blog_gallery_metabox").show();
            }
        };

        var setup_blog_format = function() {
            var format = get_blog_format();
            showhide_format_element(format);
        };

        setup_blog_format();
        $("#post-formats-select input").bind('click', setup_blog_format);
    });
})(jQuery);
