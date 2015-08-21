<?php

/**
 * @author Jegtheme
 */

add_action('admin_enqueue_scripts', 'jeg_admin_category_style');

function jeg_admin_category_style() {
    $screen = get_current_screen();
    if($screen->base === 'edit-tags' && $screen->taxonomy === 'category') {
        wp_enqueue_style ('jeg-admin-style', get_template_directory_uri() . '/public/css/backend/admin-category.css', null, JEG_VERSION);
    }
}

/*
 * Category Custom Field
 */

add_action( 'edit_category_form_fields', 'jeg_category_custom_fields' );

function jeg_category_custom_fields( $tag ) {
    $category_layout = get_option('category_layout');
    if(!isset($category_layout[ $tag->term_id ])) {
        $category_layout = '1';
    } else {
        $category_layout = $category_layout[$tag->term_id];
    }

    $category_creator = get_option('category_creator');
    if(is_array($category_creator)) {
        if(!empty($category_creator[$tag->term_id])) {
            $category_creator = $category_creator[$tag->term_id];
        }
    }
    ?>

    <tr class="form-field category-layout-creator">
        <th scope="row" valign="top" colspan="2">
            <div class="">
                <h3>Category Layout</h3>
                <!--
                <ul>
                    <li>To use existing category layout, please leave option "Choose Your Category Layout" empty</li>
                    <li>If you need custom category layout, you can go to Cat Builder and Create Category Layout, after that you will have option to choose your custom category layout on "Choose Your Category Layout" in this page</li>
                </ul>
                -->
            </div>
        </th>
    </tr>

    <tr class="form-field category-layout-creator">
        <th scope="row" valign="top">
            <label for="category-title"><?php _e("Choose Your Category Layout", 'jeg_textdomain'); ?></label>
            <span>Leave this option empty to use available category layout bellow</span>
        </th>
        <td>
            <select name="category_creator[<?php echo esc_attr( $tag->term_id ) ?>]">
                <option value=""></option>
                <?php
                $categorieslayout = new WP_Query(array(
                    'post_type'	=> 'cat_builder',
                    'nopaging' => true
                ));

                $catslayout = $categorieslayout->posts;

                foreach($catslayout as $catlayout) {
                    $selected = ( $catlayout->ID == $category_creator ) ? "selected" : "";
                    echo "<option value='{$catlayout->ID}' {$selected}>{$catlayout->post_title}</option>";
                }
                ?>
            </select>
            <br/>
            <span>If you need custom category layout, you can go to Cat Builder and Create Category Layout,
                You can choose from available category layout above or choose category layout that you been create from category layout post type. </span>
        </td>
    </tr>

    <tr class="form-field category-layout">
        <th scope="row" valign="top">
            <label for="category-title"><?php _e("Category Layout", 'jeg_textdomain'); ?></label>
            <span>Available category layout</span>
        </th>
        <td>
            <label>
                <input type="radio" name="category_layout[<?php echo esc_attr( $tag->term_id ) ?>]" value="1" <?php if ($category_layout === '1' ) { echo 'checked'; } ?>/><img src="<?php echo get_template_directory_uri() . '/public/img/category1.jpg' ?>"/>
            </label>
            <label>
                <input type="radio" name="category_layout[<?php echo esc_attr( $tag->term_id ) ?>]" value="2" <?php if ($category_layout === '2' ) { echo 'checked'; } ?>/><img src="<?php echo get_template_directory_uri() . '/public/img/category2.jpg' ?>"/>
            </label>
            <label>
                <input type="radio" name="category_layout[<?php echo esc_attr( $tag->term_id ) ?>]" value="3" <?php if ($category_layout === '3' ) { echo 'checked'; } ?>/><img src="<?php echo get_template_directory_uri() . '/public/img/category3.jpg' ?>"/>
            </label>
        </td>
    </tr>
<?php
}

/*
 * Save Category Field
 */

add_action( 'edit_category', 'jeg_save_category_custom_fields' );

function jeg_merge_option_value($currentoption, $newoption) {
    if(!is_array($currentoption)) $currentoption = array();
    foreach($newoption as $key => $option) {
        $currentoption[$key] = $option;
    }
    return $currentoption;
}

function jeg_save_category_custom_fields() {
    if( isset( $_POST['taxonomy']) && $_POST['taxonomy'] === 'category' ) {

        if ( isset( $_POST['category_layout'] ) ) {
            $category_layout = jeg_merge_option_value(get_option( 'category_layout' ), $_POST['category_layout']);
            update_option('category_layout', $category_layout);
        }

        if ( isset( $_POST['category_creator'] ) ) {
            $category_creator = jeg_merge_option_value(get_option( 'category_creator' ), $_POST['category_creator']);
            update_option('category_creator', $category_creator);
        }

    }
}

