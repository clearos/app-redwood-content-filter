<?php

/**
 * Redwood Content Filter controller.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Redwood Content Filter controller.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

class Redwood_Content_Filter extends ClearOS_Controller
{
    /**
     * Redwood Content Filter default controller.
     *
     * @return view
     */

    function index()
    {
        // Load dependencies
        //------------------

        $this->lang->load('redwood_content_filter');

        // Load views
        //-----------

        $views = array(
            'redwood_content_filter/server',
            'redwood_content_filter/settings',
        );

        $this->page->view_forms($views, lang('redwood_content_filter_app_name'));
    }
}
