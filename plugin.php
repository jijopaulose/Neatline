<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

/**
 * Plugin runner.
 *
 * @package     omeka
 * @subpackage  neatline
 * @author      Scholars' Lab <>
 * @author      Bethany Nowviskie <bethany@virginia.edu>
 * @author      Adam Soroka <ajs6f@virginia.edu>
 * @author      David McClure <david.mcclure@virginia.edu>
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html Apache 2 License
 */


// constants {{{
if (!defined('NEATLINE_PLUGIN_VERSION')) {
    define('NEATLINE_PLUGIN_VERSION', get_plugin_ini('Neatline', 'version'));
}

if (!defined('NEATLINE_PLUGIN_DIR')) {
    define('NEATLINE_PLUGIN_DIR', dirname(__FILE__));
}
// }}}


// requires {{{
require_once NEATLINE_PLUGIN_DIR . '/NeatlinePlugin.php';
require_once HELPERS;
// }}}

new NeatlinePlugin;
