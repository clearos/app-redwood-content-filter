<?php

/**
 * Redwood warning controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
 */

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Redwood warning controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
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

        $this->lang->load('content_filter_business');

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

        $this->page->view_form('content_filter_business/warning', $data, lang('content_filter_business_content_filter_warning'), $page);
    }
}
