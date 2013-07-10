
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 cc=76; */

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

Neatline.module('Editor.Record.Style', { startWithParent: false,
  define: function(Style, Neatline, Backbone, Marionette, $, _) {


  Style.ID = 'EDITOR:RECORD:STYLE';


  /**
   * Start the tab after the form.
   */
  Neatline.Editor.Record.on('start', function() {
    Style.start();
  });


  /**
   * Instantiate the tab view.
   */
  Style.addInitializer(function() {
    Style.__view = new Style.View({
      el: Neatline.request('EDITOR:RECORD:getElement')
    });
  });


}});