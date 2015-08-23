(function($){
    $(document).ready(function(){
        $(".mega-category-menu input").bind('click', function(){
            var element = $(this);
            var parent = $(this).parents('.menu-item-settings');
            if($(element).is(":checked")) {
                $(parent).find('.mega-review-menu input').attr('checked', false);
            }
        });

        $(".mega-review-menu input").bind('click', function(){
            var element = $(this);
            var parent = $(this).parents('.menu-item-settings');
            if($(element).is(":checked")) {
                $(parent).find('.mega-category-menu input').attr('checked', false);
            }
        });
    });
})(jQuery);
