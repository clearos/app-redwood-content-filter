<?php

/**
 * Redwood warning controller.
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
 * Redwood warning controller.
 *
 * @category   apps
 * @package    redwood-content-filter
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2016 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/redwood_content_filter/
 */

class Warning extends ClearOS_Controller
{
    /**
     * Content filter warning overview.
     *
     * @return view
     */

    function index()
    {
        // Load dependencies
        //------------------

        $this->lang->load('redwood_content_filter');

        // View data
        //----------

        // FIXME
        // Note: if 'User' data is an IP, set data['ip'], otherwise set data['user'];
        $data['categories'] = array('Drugs', 'Violence');
        $data['url'] = 'http://www.example.org';
        $data['user'] = 'testguy';
        $data['ip'] = '192.168.1.100';
        $data['scores'] = array(
            'drugs' => 1200,
            'violence' => 200,
        );

        // Trim down long URLs
        if (strlen($data['url']) > 60)
            $data['url'] = substr($data['url'], 0, 60) . ' ...';

        // Load views
        //-----------

        $page['type'] = MY_Page::TYPE_SPLASH_ORGANIZATION;

        $this->page->view_form('redwood_content_filter/warning', $data, lang('redwood_content_filter_content_filter_warning'), $page);
    }
}
