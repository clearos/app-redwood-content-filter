<?php

/**
 * Content Filter for Business controller.
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
 * Content Filter for Business controller.
 *
 * @category   apps
 * @package    content-filter-business
 * @subpackage controllers
 * @author     ClearCenter <developer@clearcenter.com>
 * @copyright  2016 ClearCenter
 * @license    http://www.clearcenter.com/app_license ClearCenter license
 * @link       http://www.clearcenter.com/support/documentation/clearos/content_filter_business/
 */

class Content_Filter_Business extends ClearOS_Controller
{
    /**
     * Content Filter for Business default controller.
     *
     * @return view
     */

    function index()
    {
        // Load dependencies
        //------------------

        $this->lang->load('content_filter_business');

        // Load views
        //-----------

        $views = array(
            'content_filter_business/server',
            'content_filter_business/settings',
        );

        $this->page->view_forms($views, lang('content_filter_business_app_name'));
    }
}
