(function($){
    $(document).ready(function(){

        var get_template_value = function() {
            return $("#page_template").val();
        };

        var normalize_view = function(){
            $("#postdivrich").show();
            $("#wpb_visual_composer").hide();
            $(".composer-switch").hide();
            $("#normal-sortables > div").each(function(){
                $(this).attr('style', '');
            });
        };

        var page_metabox_visibililty = function() {

            var composerswitch = $(".composer-switch");
            var wpbvc =  $("#wpb_visual_composer");
            var postrich = $("#postdivrich");

            var template = get_template_value();
            normalize_view();

            if(template === 'template-landing.php') {
                composerswitch.show();
                wpbvc.show();

                if(composerswitch.hasClass('vc-backend-status') || composerswitch.hasClass('vc_backend-status')) {
                    postrich.hide();
                    wpbvc.show();
                } else {
                    postrich.show();
                    wpbvc.hide();
                }
            } else if(template === 'template-review.php'){
                $(postrich).hide();
                $("#jmagz_review_metabox").show();
            } else if(template === 'template-index.php'){
                $(postrich).hide();
                $("#jmagz_page_index_metabox").show();
            } else if(template === 'default'){
                $("#jmagz_page_metabox_metabox").show();
            }
        };

        setTimeout(function(){ page_metabox_visibililty(); }, 500);
        $("#page_template").bind('change', page_metabox_visibililty);	});
})(jQuery);
