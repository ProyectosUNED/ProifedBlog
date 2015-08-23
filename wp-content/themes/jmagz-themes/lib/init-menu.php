<?php
/***
 * @author jegbagus
 */

/** register support for wordpress menu **/
add_action('after_setup_theme', 'jeg_register_menu');

function jeg_register_menu() {
    add_theme_support( 'menus' );
    if(function_exists('register_nav_menu')):
        register_nav_menus(array(
            'top_navigation' => 'Top Navigation',
            'mobile_navigation' => 'Mobile Navigation',
            'bottom_navigation' => 'Bottom Navigation'
        ));
    endif;
};

/******************************************************************
 * Bottom Navigation
 ******************************************************************/

function jeg_bottom_navigation() {
    if(function_exists('wp_nav_menu')) {
        wp_nav_menu(
            array(
                'theme_location' => 'bottom_navigation',
                'container' => 'nav',
                'container_class' => 'footer-nav',
                'menu_class' => '',
                'depth' => 1,
                'fallback_cb'     => ''
            )
        );
    }
}

/******************************************************************
 * Mobile Navigation
 ******************************************************************/

function jeg_mobile_navigation() {
    if(function_exists('wp_nav_menu')) {
        wp_nav_menu(
            array(
                'theme_location' => 'mobile_navigation',
                'container' => 'ul',
                'menu_class' => '',
                'depth' => 1,
                'walker' => new jeg_mobile_navigation_walker(),
                'fallback_cb'     => ''
            )
        );
    }
}

class jeg_mobile_navigation_walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "";
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "";
    }

    function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
    {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'bgnav';

        $additionalclass 	= ( $depth > 0 ) ? " childindent " : "";
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . $additionalclass .'"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

        $indent 	 = str_repeat("&nbsp;", $depth * 2);
        $dash 		 = ( $depth > 0 ) ? '-- &nbsp;&nbsp;' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $indent . $dash . $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ) . '</li>';
    }
}



/******************************************************************
 * Top Navigation
 ******************************************************************/

function jeg_top_navigation() {
    if(function_exists('wp_nav_menu')) {
        wp_nav_menu(
            array(
                'theme_location' => 'top_navigation',
                'container' => '',
                'items_wrap' => '%3$s',
                'container_class' => 'navcontent',
                'depth' => 3,
                'walker' => new jeg_top_navigation_walker(),
                'fallback_cb'     => ''
            )
        );
    }
}

class jeg_top_navigation_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';
        $enablemega = get_post_meta($item->ID, 'menu_item_megacategory', true) === "true";
        $enablemegareview = get_post_meta($item->ID, 'menu-item-megareview', true) === "true";

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'bgnav';

        if($enablemega || $enablemegareview) {
            $classes[] = 'mega-menu';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
        $item_output .= '</a>';
        $item_output .= $args->after;

        if($enablemegareview) {
            $isreview = ($item->object == 'review-category' && $item->type == 'taxonomy' );
            $recentreviewurl = $item->url;
            $reviewid = $item->object_id;
            $childreview = '';

            $childreviewtemp = get_post_meta($item->ID, 'menu-item-megachildreview', true);
            if($isreview) {
                $childreview = "<li data-menu-category-id='" . $reviewid . "' class='newsfeed-heading review-menu active'><a href='" . $recentreviewurl . "'>" . __('Recent Review','jeg_textdomain') . "</a></li>";
            } else {
                $reviewid = $childreviewtemp[0];
            }

            foreach($childreviewtemp as $childrev) {
                $active = ( $reviewid === $childrev ) ? "active" : "";
                $term = get_term_by('id', $childrev, 'review-category');
                if($term) {
                    $termlink = get_term_link($term->term_id, 'review-category');
                    $childreview .=
                        "<li data-menu-category-id='" . $childrev . "' class='review-menu " . $active . "'>
                            <a href='" . $termlink . "'>" . $term->name . "</a>
                        </li>";
                }
            }

            $item_output .=
                "<div class='sub-menu'><!-- submenu post -->
                    <div class='newsfeed clearfix'>
                        <ul class='newsfeed-categories'>
                            " . $childreview . "
                        </ul>
                        <div class='newsfeed-posts'>

                            <div class='newsfeed-overlay'>
                                <div class='jpreloader preloader'>
                                    <span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- submenu review -->";
        }

        // build mega menu category drop down
        if($enablemega) {
            $iscategory = ( $item->object == 'category' && $item->type == 'taxonomy' );
            $recentnewsurl = $item->url;
            $categoryid = $item->object_id;
            $childcategory = '';

            // child menu list
            $childcategorytemp = get_post_meta($item->ID, 'menu-item-megachild', true);

            if($iscategory) {
                $childcategory .= "<li data-menu-category-id='" . $categoryid . "' class='newsfeed-heading active'><a href='" . $recentnewsurl . "'>" . __('Recent News','jeg_textdomain') . "</a></li>";
            } else {
                $categoryid = $childcategorytemp[0];
            }

            foreach($childcategorytemp as $childcat) {
                $active = ( $categoryid === $childcat ) ? "active" : "";
                $childcategory .=
                    "<li data-menu-category-id='" . $childcat . "' class='" . $active . "'>
                        <a href='" . get_category_link($childcat) . "'>" . get_cat_name($childcat) . "</a>
                    </li>";
            }

            $item_output .=
                "<div class='sub-menu'><!-- submenu post -->
                    <div class='newsfeed clearfix'>
                        <ul class='newsfeed-categories'>
                            " . $childcategory . "
                        </ul>
                        <div class='newsfeed-posts'>

                            <div class='newsfeed-overlay'>
                                <div class='jpreloader preloader'>
                                    <span></span><span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- submenu post -->";
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"childmenu\">\n";
    }
}
