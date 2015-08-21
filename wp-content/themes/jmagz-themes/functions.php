<?php

	// Linea agregada para poder utilizar shortCode en text widgets
	add_filter('widget_text', 'do_shortcode');
/**
 * @author Jegtheme
 */

$jplugincompatible = '1.0.3';
$jmagzplugincompatible = '1.0.3';

locate_template(array('lib/init.php'), true, true);
locate_template(array('lib/common-function.php'), true, true);
locate_template(array('lib/admin-setup.php'), true, true);
locate_template(array('tgm/plugin-list.php'), true, true);
locate_template(array('lib/load-script.php'), true, true);
locate_template(array('lib/ajax-response.php'), true, true);
locate_template(array('lib/additional-filter.php'), true, true);
locate_template(array('lib/init-widget.php'), true, true);
locate_template(array('lib/jeg-customizer.php'), true, true);
locate_template(array('lib/init-menu.php'), true, true);
locate_template(array('lib/plugin-update-notice.php'), true, true);