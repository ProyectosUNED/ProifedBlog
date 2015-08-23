<?php
/**
 * update theme check
 */
add_action('admin_notices' ,'jeg_check_plugin_compatible');

function jeg_parse_version ($version) {
    $ver = explode('.', $version);
    $vercount = $ver[0] * 1000 + $ver[1] * 100 + $ver[2] * 10;
    return $vercount;
}

function jeg_check_plugin_compatible() {
    if(defined('JEG_PLUGIN_VERSION')) {
        $jpversion = JEG_PLUGIN_VERSION;
        global $jplugincompatible;

        if(jeg_parse_version($jpversion) < jeg_parse_version($jplugincompatible)) {
            echo
            "<div class='updated' id='message'>
                <p>Please udpate your plugin. This themes compatible with <b>jplugin version {$jplugincompatible}</b> </p>
                <p>You can delete you current installed plugin, and themes will notice you to installt he plugin again</p>
            </div>";
        }
    }

    if(defined('JMAGZ_PLUGIN_VERSION')) {
        $jmagzversion = JMAGZ_PLUGIN_VERSION;
        global $jmagzplugincompatible;

        if(jeg_parse_version($jmagzversion) < jeg_parse_version($jmagzplugincompatible)) {
            echo
            "<div class='updated' id='message'>
                <p>Please udpate your plugin. This themes compatible with <b>jmagz-plugin version {$jmagzplugincompatible}</b> </p>
                <p>You can delete you current installed plugin, and themes will notice you to installt he plugin again</p>
            </div>";
        }
    }
}