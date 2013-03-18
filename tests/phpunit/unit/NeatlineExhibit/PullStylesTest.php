<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=76; */

/**
 * Tests for `pullStyles` on `NeatlineExhibit`.
 *
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

class Neatline_NeatlineExhibitTest_PullStyles
    extends Neatline_Test_AppTestCase
{


    /**
     * `pullStyles` should update the stylesheet with record values.
     */
    public function testPullStyles()
    {

        $exhibit = $this->__exhibit();
        $exhibit->styles = "
            .tag1 {
              fill-color: 1;
              fill-opacity: 2;
            }
            .tag2 {
              stroke-color: 3;
              stroke-opacity: 4;
            }
            .tag3 {
              stroke-color: 5;
              stroke-opacity: 6;
            }
        ";
        $record = new NeatlineRecord($exhibit);
        $record->fill_color     = '7';
        $record->fill_opacity   = 8;
        $record->stroke_color   = '9';
        $record->stroke_opacity = 10;
        $record->tags = 'tag1,tag2';

        // Pull styles.
        $exhibit->pullStyles($record);
        $this->assertEquals(_nl_readCSS($exhibit->styles), array(

            // `tag1` and `tag2` styles updated.
            'tag1' => array(
                'fill_color' => '7',
                'fill_opacity' => '8'
            ),
            'tag2' => array(
                'stroke_color' => '9',
                'stroke_opacity' => '10'
            ),

            // `tag3` styles unchanged.
            'tag3' => array(
                'stroke_color' => '5',
                'stroke_opacity' => '6'
            )

        ));

    }


    /**
     * Rules with invalid properties should be ignored.
     */
    public function testIgnoreInvalidProperties()
    {

        $exhibit = $this->__exhibit();
        $exhibit->styles = "
            .tag {
              fill-color: 1;
              invalid: value;
            }
        ";
        $record = new NeatlineRecord($exhibit);
        $record->fill_color = '2';
        $record->tags = 'tag';

        // Pull styles.
        $exhibit->pullStyles($record);
        $this->assertEquals(_nl_readCSS($exhibit->styles), array(

            // Invalid property should be ignored.
            'tag' => array(
                'fill_color' => '2',
                'invalid' => 'value'
            )

        ));

    }


    /**
     * Rules under the `all` selector should be pulled from all records.
     */
    public function testAllSelector()
    {

        $exhibit = $this->__exhibit();
        $exhibit->styles = "
            .all {
              fill-color: 1;
            }
        ";
        $record = new NeatlineRecord($exhibit);
        $record->fill_color = '2';

        // Pull styles.
        $exhibit->pullStyles($record);
        $this->assertEquals(_nl_readCSS($exhibit->styles), array(

            // `all` selector should be updated.
            'all' => array(
                'fill_color' => '2',
            )

        ));

    }


}